<?php

namespace App;

use App\Group;
use App\SendRequest;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'request_list', 'friend_list',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function groups()
    {
        return $this->belongsToMany(Group::class)->withTimestamps();
    }
    
    public function request()
    {
        return $this->belongsToMany('App\User', 'send_requests', 'user_id', 'friend_id');
    }
    
    public function friend()
    {
        return $this->belongsToMany('App\User', 'friends', 'user_id', 'friend_id');
    }


}
