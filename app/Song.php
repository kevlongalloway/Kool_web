<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Grade;

class Song extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title','standard','tags','month','subject_id'
    ];

    public function subject(){
    	return $this->belongsTo('App\Subject');
    }

    public function grades(){
        return $this->belongsToMany('App\Grade');
    }  

   
}