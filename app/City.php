<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;

    public function districts()
    {
        return $this->hasMany('App\District');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
