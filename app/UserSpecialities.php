<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSpecialities extends Model
{
    protected $guarded = ['id'];
    protected $table = 'users_specialities';


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    
}
