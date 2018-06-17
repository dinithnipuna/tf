<?php 

namespace App\Traits;

trait PostableTrait
{
    public function printThis()
    {
        $post = Post::create([
            'body'=> $request->input('body'),
        ])->user()->associate(Auth::user());

        $this->posts()->save($post);
    }
}