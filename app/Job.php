<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Job extends Model
{
    use HasRoles;
    protected $guarded = [];
}
