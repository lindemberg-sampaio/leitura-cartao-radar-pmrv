<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opm extends Model
{
    protected $fillable = [

        'number','address','city','phone','mobilephone', 

    ];


    public function user()
    {

        return $this->hasMany(User::class);
        
    }
}
