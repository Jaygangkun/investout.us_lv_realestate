<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyInfo extends Model
{
    protected $table = 'property_questions';
    protected $guarded = ['id'];
}
