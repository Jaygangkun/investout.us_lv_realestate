<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersBodyOfWork extends Model
{
    protected $guarded = ['id'];
    protected $table = 'users_body_of_work';


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    
}
