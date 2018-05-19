<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Post;
use Response;
use Auth;

class HomeController extends Controller
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
    public function index()
    {
        $posts = Post::whereNull('parent_id')->whereNull('class_id')->where(function($query){
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
}
