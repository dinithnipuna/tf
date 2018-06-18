<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Cls;
use App\Topic;
use App\User;
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

        $post = Post::create([
            'body'=> $request->input('body'),
        ])->user()->associate(Auth::user());

        if($request->post_type == 'App\Cls'){
            $new_post = Cls::find($request->class_id)->posts()->save($post);
        }elseif($request->post_type == 'App\Topic'){
            $new_post = Topic::find($request->topic_id)->posts()->save($post);
        }else {
            $new_post = User::find($request->user_id)->posts()->save($post);
        }

        Notification::send(Auth::user()->friends(), new NewPost($new_post));

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

        $post = Post::find($postId);

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

    public function solution(Request $request, $postId){
        
        $solution_post = Post::find($postId);
        $post = Post::find($request->post_id);

        if(!$post){
            return redirect()->back();
        }

        $post->solution_id = $solution_post->id;
        $post->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        Post::find($id)->delete();
    }

}
