<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = [
        'class_id','name','description'
    ];

    public function forum(){
        return $this->belongsTo('App\Cls','class_id');
    }

    public function posts(){
        return $this->morphMany('App\Post','postable');
    }

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
