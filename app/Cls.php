<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cls extends Model
{
    protected $table = 'classes';

    public function grade(){
		return $this->belongsTo('App\Grade');
	}

	public function subject(){
		return $this->belongsTo('App\Subject');
	}

	public function user(){
		return $this->belongsTo('App\User');
	}

	 public function posts(){
        return $this->hasMany('App\Post','class_id');
    }
}
