<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;
use App\Post;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts(){
        return $this->hasMany('App\Post','user_id');
    }

    public function institutes(){
        return $this->belongsToMany('App\Institute');
    }

    public function subjects(){
        return $this->belongsToMany('App\Subject');
    }

    public function friendOfMine(){
        return $this->belongsToMany('App\User','friends','user_id','friend_id');
    }

    public function friendOf(){
        return $this->belongsToMany('App\User','friends','friend_id','user_id');
    }

    public function friends(){
        return $this->friendOfMine()->wherePivot('accepted',true)->get()->merge($this->friendOf()->where('accepted',true)->get());
    }

    public function friendRequests(){
        return $this->friendOfMine()->wherePivot('accepted',false)->get();
    }

    public function friendRequestsPending(){
        return $this->friendOf()->wherePivot('accepted',false)->get();
    }

    public function hasFriendRequestPending(User $user){
        return (bool) $this->friendRequestsPending()->where('id',$user->id)->count();
    }

    public function hasFriendRequestsReceived(User $user){
        return (bool) $this->friendRequests()->where('id',$user->id)->count();
    }

    public function addFriend(User $user){
        return $this->friendOf()->attach($user->id);
    }

    public function addFriendAndAccept(User $user){
        return $this->friendOf()->attach($user->id,['accepted' => true]);
    }

    public function deleteFriend(User $user){
        return $this->friendOf()->detach($user->id);
    }

    public function acceptFriendRequests(User $user){
        return $this->friendRequests()->where('id',$user->id)->first()->pivot->update([
                'accepted' => true,
            ]);
    }

    public function isFriendWith(User $user){
        return (bool) $this->friends()->where('id',$user->id)->count();
    }

    public function hasLikedPost(Post $post){
        return (bool) $post->likes->where('likeable_id',$post->id)
                                ->where('likeable_type',get_class($post))
                                ->where('user_id', $this->id)
                                ->count();
    }

    public function classesOfMine(){
        return $this->belongsToMany('App\User','class_user','user_id','class_id');
    }

    public function classes(){
        return $this->classesOfMine()->wherePivot('accepted',true)->get();
    }

    public function isJoinWithClass(Cls $class){
        return (bool) $this->classes()->where('id',$class->id)->count();
    }

    public function notebooks(){
        return $this->hasMany('App\Notebook');
    }
}
