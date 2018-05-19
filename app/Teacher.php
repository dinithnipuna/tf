<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
	public function institute(){
		return $this->belongsTo('App\Institute');
	}
}
