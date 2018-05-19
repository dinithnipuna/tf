<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'body','class_id','post_type'
    ];

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function scopeNotReply($query){
        return $query->whereNull('parent_id');
    }

    public function replies(){
        return $this->hasMany('App\Post','parent_id');
    }

     public function likes(){
        return $this->morphMany('App\Like','likeable');
    }
}
