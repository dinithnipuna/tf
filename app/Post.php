<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'body'
    ];

    public function postable()
    {
        return $this->morphTo();
    }

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function postableUser(){
        return $this->belongsTo('App\User','postable_id');
    }

    public function replies(){
        return $this->morphMany('App\Post','postable');
    }

    public function likes(){
        return $this->morphMany('App\Like','likeable');
    }
}
