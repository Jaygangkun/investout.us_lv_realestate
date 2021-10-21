<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    protected $guarded=[];
    use SoftDeletes;

    public function inquiries(){
        return $this->hasMany(Inquiry::class,'slot_id','id');
    }

}
