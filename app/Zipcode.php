<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Zipcode extends Model
{
    protected $guarded = ['id'];

    use SearchableTrait;

    protected $searchable = [
        'columns' => [
            'zipcodes.state' => 1,
        ]
    ];
}
