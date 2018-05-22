<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $fillable = [
        'title','class_id','body',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function class(){
        return $this->belongsTo('App\Cls');
    }
}
