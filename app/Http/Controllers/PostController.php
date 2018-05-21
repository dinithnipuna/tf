<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use Auth;
use App\Notifications\RepliedToPost;

class PostController extends Controller
{
   
    public function store(Request $request)
    {
        $this->validateWith([
            'body' => 'required|max:1000'
        ]);

        if($request->post_type){
            Auth::user()->posts()->create([
                'body'=> $request->input('body'),
                'post_type' => $request->input('post_type'),
                'class_id' => $request->input('class_id'),
            ]);
        }else{
            Auth::user()->posts()->create([
                'body'=> $request->input('body'),
            ]);
        }

        

        return redirect()->back();
    }

    public function reply(Request $request, $postId)
    {
        $this->validateWith([
            "reply-{$postId}" => 'required|max:1000'
        ]);

        $post = Post::where('parent_id',null)->find($postId);

        if(!$post){
            return redirect()->back();
        }

        $reply = Post::create([
            'body'=> $request->input("reply-{$postId}"),
        ])->user()->associate(Auth::user());

        $post->replies()->save($reply);

        $post->user->notify(new RepliedToPost($post));

        return redirect()->back();
    }

    public function getLike($postId){
        
        $post = Post::find($postId);

        if(!$post){
            return redirect()->back();
        }
    }

}
