<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Realtor extends Model
{
    protected $fillable = ['brokeragehouse_id','realtor_id','status'];
}
