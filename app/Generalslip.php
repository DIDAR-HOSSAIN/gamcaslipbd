<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Generalslip extends Model
{
//    protected $fillable = [
//        'city_name','traveling_country','visa_type','mob_no','passport_image','gender','status',
//    ];

    protected $guarded = [];

    public function city(){
        return $this->belongsTo('App\City');
    }
}
