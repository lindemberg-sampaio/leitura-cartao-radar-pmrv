<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Graduation extends Model
{

    protected $fillable = ['description'];



    public function user()
    {
        return $this->hasMany(User::class);
    }

}
