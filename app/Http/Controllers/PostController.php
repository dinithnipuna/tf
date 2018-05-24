<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use Auth;
use App\Notifications\RepliedToPost;
use App\Notifications\NewPost;
use Notification;

class PostController extends Controller
{
   
    public function store(Request $request)
    {
        $this->validateWith([
            'body' => 'required|max:1000'
        ]);

        if($request->post_type){
            $post = Auth::user()->posts()->create([
                'body'=> $request->input('body'),
                'post_type' => $request->input('post_type'),
                'class_id' => $request->input('class_id'),
            ]);
        }else{
            $post = Auth::user()->posts()->create([
                'body'=> $request->input('body'),
            ]);
        }

        Notification::send(Auth::user()->friends(), new NewPost($post));

        return redirect()->back();
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return $post;
    }

    public function update(Request $request)
    {
        $this->validateWith([
            'body' => 'required',
        ]);

        $post = Post::find($request->post_id);

        $post->update([
                'body'=> $request->input('body'),
        ]);

        return $post;        
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
