<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choiceslip extends Model
{
    protected $guarded = [];

    public function city(){
        return $this->belongsTo('App\City');
    }

    public function center(){
        return $this->belongsTo('App\Center');
    }
}
