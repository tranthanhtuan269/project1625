<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    protected $fillable = ['name', 'district_id'];
    public $timestamps = false;

    public function district()
    {
        return $this->belongsTo('App\District');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
