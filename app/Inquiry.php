<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inquiry extends Model
{
    protected $guarded=[];
    use SoftDeletes;
    public function bookings(){
        return $this->belongsTo(Booking::class,'slot_id')->withTrashed();
    }
}
