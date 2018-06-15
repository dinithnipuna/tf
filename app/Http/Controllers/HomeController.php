<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Post;
use Response;
use Auth;
use Hash;
use Session;
use Illuminate\Support\Str;
use Mail;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('postable_type','App\User')->where(function($query){
            return $query->where('user_id',Auth::user()->id)
            ->orWhereIn('user_id',Auth::user()->friends()->lists('id'));
        })->orderBy('created_at','desc')->get();

        return view('home')->with('posts', $posts);
    }


    public function autocomplete(Request $request){

        $term =$request->term;

        $results = array();
        
        $users = User::where('name', 'LIKE', '%'.$term.'%')
                ->orWhere('town', 'LIKE', '%'.$term.'%')
                ->get();

        foreach ($users as $user)
        {
            if($user->hasRole(['manager','teacher'])){
                $results[] = [ 'id' => $user->id, 'value' => $user->name ,'route' => route('profile', $user->id)];
            }            
        }

        return Response::json($results);
    }

    public function signup(Request $request)
    {
        $password = $request->password;

        $request->merge(['password' => Hash::make($request->password)]);
   
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->verifyToken = Str::random(40);
        $user->save();

        $role = Role::where('name', 'student')->first();

        $user->attachRole($role);

        $this->sendEmail($user, $password);

        Session::flash('success','Account Created. Verify Email to activate account.!');

        return redirect('/login');
    }

    public function sendEmail($user, $password)
    {
        Mail::send('mail.verifyEmail', ['user' => $user, 'password'=>$password], function ($m) use ($user) {
            $m->from('admin@tf.com', 'Teacher Finder');
            $m->to($user->email, $user->name)->subject('Email Verify');
        });
    }

    public function markAsRead()
    {
        Auth::user()->unreadNotifications->markAsRead();
    }

    public function getVerify($email, $verifyToken)
    {
        $user = User::where('email', $email)->first();

        if($user){
            if($user->verifyToken == $verifyToken){
                $user->status = 1;
                $user->verifyToken = Null;
                $user->save();
                Session::flash('success','Email Verified Successfully.!');
            } else{
                Session::flash('success','Email Already Verified.');
            }        
        }else{
            Session::flash('error','User not Found.');           
        }

        return redirect('/login');
    }

}
