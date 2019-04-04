<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','first_login',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function organization(){
        return $this->belongsTo('App\Organization');
    }


    public function classrooms(){
        return $this->hasMany('App\Classroom');
    }

    public function playlists(){
        return $this->morphToMany('App\Playlist','playlistable');
    }  

    public function createPlaylist(){
        return $this->playlists()->create();
    }

    public function createClass(){
        $this->classrooms()->create();
    }

    public function loggedIn(){
        return $this->update(['first_login' => 1]);
    }



    
}
