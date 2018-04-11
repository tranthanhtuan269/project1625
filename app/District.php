<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = ['name', 'city_id'];
    public $timestamps = false;

    public function city()
    {
        return $this->belongsTo('App\City');
    }
    
    public function towns()
    {
        return $this->hasMany('App\Town');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
