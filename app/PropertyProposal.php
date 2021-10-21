<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyProposal extends Model
{
    protected $guarded = ['id'];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function property()
    {
        return $this->belongsTo('App\Property');
    }
    
    public function fromUser()
    {
        return $this->belongsTo('App\User', 'from_user');
    }

    public function toUser()
    {
        return $this->belongsTo('App\User', 'to_user');
    }
}
