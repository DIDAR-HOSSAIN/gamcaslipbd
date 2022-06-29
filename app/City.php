<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded = [];

    public function centers(){
        return $this->hasMany('App\Center');
    }

    public function genslips(){
        return $this->hasMany('App\Generalslip');
    }

    public function choiceslips(){
        return $this->hasMany('App\Choiceslip');
    }


}
