<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['user_id','phone','city','state','phone','company','location','image','aboutme','socialmedia','inputvideo','experience'];


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}