<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    protected $guarded = [];
    public function city(){
        return $this->belongsTo('App\City');
    }
    public function choices(){
        return $this->hasMany('App\Choice');
    }

    public function choiceslips(){
        return $this->hasMany('App\Choiceslip');
    }
}
