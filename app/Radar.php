<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Radar extends Model
{
    protected $fillable = [
        'patrimony', 'inventory', 'bop',  
    ];
}
