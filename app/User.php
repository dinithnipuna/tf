<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;
use Cmgmyr\Messenger\Traits\Messagable;
use Illuminate\Notifications\Notifiable;
use App\Post;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;
    use Messagable;
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

    public function getAvatar(){
        if($this->avatar){
            return $this->avatar;
        }

        return 'default.png';
    }

    public function posts(){
        return $this->morphMany('App\Post','postable');
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

     public function teachers(){
        return $this->friendOfMine()->wherePivot('accepted',true)->get()->merge($this->friendOf()->where('accepted',true)->get())->roles()->where('name','teacher')->get();
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
        return $this->belongsToMany('App\Cls','class_user','user_id','class_id');
    }

    public function classes(){
        return $this->classesOfMine()->wherePivot('accepted',true);
    }

    public function classOf(){
        return $this->belongsToMany('App\Cls','class_user','user_id','class_id');
    }

    public function addClass(Cls $class){
        return $this->classOf()->attach($class->id,['accepted' => true]);
    }

    public function deleteClass(Cls $class){
        return $this->classOf()->detach($class->id);
    }

    public function isJoinWithClass(Cls $class){
        return (bool) $this->classes()->where('class_id',$class->id)->count();
    }

    public function notebooks(){
        return $this->hasMany('App\Notebook');
    }

    public function assignments(){
        return $this->hasMany('App\Assignment');
    }

    public function clses(){
        return $this->hasMany('App\Cls');
    }


    public function messageOfMine(){
        return $this->belongsToMany('App\User','private_messages','sender_id','receiver_id');
    }

    public function messageOf(){
        return $this->belongsToMany('App\User','private_messages','receiver_id','sender_id');
    }

    public function pms(){
        return $this->messageOf()->wherePivot('read',false)->get();
    }

    public function messages(){
        return $this->belongsToMany('App\PrivateMessage','user_id','receiver_id');
    }

}
