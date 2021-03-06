<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\User;

class Organization extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name', 'email', 'password','subscription_id','is_active'
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

    
    public function teachers(){
        return $this->hasMany('App\Teacher');
    }

    public function users(){
        return $this->hasMany('App\User');
    }

    public function playlists(){
        return $this->morphToMany('App\Playlist','playlistable');
    } 

    public function createPlaylist(){
        return $this->playlists()->create();
    }

    public function subscription(){
        return $this->belongsTo('App\Subscription');
    }

    public function addTeacher($request){
        $this->teachers()->create($this->teacherData($request));
    }

    public function addUser($request){
        $this->users()->create($this->userData($request));

    }

    public function setSubscriptionLevel($id){
        $this->update(['subscription_id' => $id]);
    }

    /*Check is user is active*/
    public function isActive(){
        return $this->is_active;
    }

    public function activate(){
        return $this->update(['is_active' => 1]);
    }

    public function deactivate(){
        return $this->update(['is_active' => 0]);
    }


    protected function teacherData($request){
        return $data = [
            'name' => $request->name,
            'email'=>$request->email,
            'password' => Hash::make($request->password),
        ];
    }

    protected function userData($request){
       return $data = [
            'name' => $request->name,
            'email'=>$request->email,
            'password' => Hash::make($request->password),
        ];

    }

    public function generateAccessCode(){
        $code = rand(100000,999999);
        if(!Organization::find($code)){
           $this->update(['id' => $code]);
           return $code;
        }
        generateAccessCode();
    }

    public function hashPassword($request){
        $this->update(['password' => Hash::make($request->password)]);
    }
}
