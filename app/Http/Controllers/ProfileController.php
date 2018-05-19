<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Cls;
use App\Student;
use App\Manager;
use App\Post;
use Response;
use Auth;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProfile($id)
    {
        $user = User::find($id);

        if(!$user){
            abort(404);
        }

        $posts = $user->posts()->whereNull('parent_id')->get();
        $requests = Auth::user()->friendRequests();

        if($user->hasRole('teacher')){
            $classes = Cls::where('user_id',$user->id)->get();
            

            return view('teachers.show')
                    ->with('user', $user)
                    ->with('classes', $classes)
                    ->with('requests', $requests)
                    ->with('posts',$posts);
        }else if($user->hasRole('manager')){
            return view('institutes.show')
                    ->with('user', $user)
                    ->with('posts',$posts)
                    ->with('requests', $requests);
        }else{
            return view('students.show')->with('user',$user)->with('posts',$posts);
        }
        
    }

    public function join($userId)
    {
        $user = User::find($userId);

        if(!$user){
            return redirect()->route('home');
        }

        Auth::user()->addFriend($user);

        return redirect()->back();
    }

    public function accept($userId)
    {
        $user = User::find($userId);

        if(!$user){
            return redirect()->route('home');
        }

        if(!Auth::user()->hasFriendRequestsReceived($user)){
            return redirect()->route('home');
        }

        Auth::user()->acceptFriendRequests($user);

        return redirect()->back();
    }

    public function leave($userId)
    {
        $user = User::find($userId);

        if(!$user){
            return redirect()->route('home');
        }

        if(!Auth::user()->isFriendWith($user)){
            return redirect()->route('home');
        }

        Auth::user()->deleteFriend($user);

        return redirect()->back();
    }
}
