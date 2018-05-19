<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notebook extends Model
{
    protected $fillable = [
        'name',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function notes(){
        return $this->hasMany('App\Note');
    }
}
