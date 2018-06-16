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

    public function upload(Request $request)
    {
        // Allowed origins to upload images
$accepted_origins = array("http://localhost", "http://107.161.82.130", "http://codexworld.com");

// Images upload path
$imageFolder = "public/images/uploads/";

reset($_FILES);
$temp = current($_FILES);
if(is_uploaded_file($temp['tmp_name'])){
    if(isset($_SERVER['HTTP_ORIGIN'])){
        // Same-origin requests won't set an origin. If the origin is set, it must be valid.
        if(in_array($_SERVER['HTTP_ORIGIN'], $accepted_origins)){
            header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
        }else{
            header("HTTP/1.1 403 Origin Denied");
            return;
        }
    }
  
    // Sanitize input
    if(preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $temp['name'])){
        header("HTTP/1.1 400 Invalid file name.");
        return;
    }
  
    // Verify extension
    if(!in_array(strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION)), array("gif", "jpg", "png"))){
        header("HTTP/1.1 400 Invalid extension.");
        return;
    }
  
    // Accept upload if there was no origin, or if it is an accepted origin
    $filetowrite = $imageFolder . $temp['name'];
    move_uploaded_file($temp['tmp_name'], $filetowrite);
  
    // Respond to the successful upload with JSON.
    return json_encode(array('location' => $filetowrite));
} else {
    // Notify editor that the upload failed
    header("HTTP/1.1 500 Server Error");
}
    }

}
