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
        return $this->morphMany('App\Post','postable');
    }

    public function assignments(){
        return $this->hasMany('App\Assignment','class_id');
    }

    public function students(){
        return $this->belongsToMany('App\User','class_user','class_id','user_id');
    }

    public function topics(){
        return $this->hasMany('App\Topic','class_id');
    }

     public function getCover(){
        if($this->cover){
            return $this->cover;
        }

        return 'class-cover.jpg';
    }
}
