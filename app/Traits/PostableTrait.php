<?php 

namespace App\Traits;

use App\Post;
use Auth;

trait PostableTrait
{
    public function createPost($body)
    {
        $post = Post::create([
            'body'=> $body,
        ])->user()->associate(Auth::user());

        $this->posts()->save($post);

        return $post;
    }
}