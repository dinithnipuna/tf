<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Topic;
use App\Comment;
use Auth;

class CommentController extends Controller
{
    public function addTopicComment(Request $request, Topic $topic)
    {
        $this->validateWith([
        	'body' => 'required',
        ]);

        $comment = new Comment();
        $comment->body = $request->body;
        $comment->user_id = Auth::user()->id;

        $topic->comments()->save($comment)

        return view('forums.index')->with('forums', $forums);
    }
}
