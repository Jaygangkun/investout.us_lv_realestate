<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Property extends Model
{
    protected $guarded = ['id'];

    use SearchableTrait;

    protected $searchable = [
        'columns' => [
            'properties.address' => 1,
            'properties.city' => 2,
            'properties.state' => 3,
            'properties.zip' => 4,
            // 'property_images.image'=>5
        ]
    ];


    public function seller()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function items()
    {
        return $this->hasOne('App\PropertyItem');
    }

    public function info()
    {
        return $this->hasOne('App\PropertyInfo');
    }

    public function detail()
    {
        return $this->hasOne('App\PropertyDetail');
    }

    public function images()
    {
        return $this->hasMany('App\PropertyImage');
    }

    public function videos()
    {
        return $this->hasMany('App\PropertyVideo');
    }

    public function documents()
    {
        return $this->hasMany('App\PropertyDocument');
    }

    public function proposals()
    {
        return $this->hasMany('App\Proposal');
    }
}
