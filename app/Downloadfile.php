<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Downloadfile extends Model
{
    protected $fillable = [

        'filename', 'size', 'senddate', 'messagenumber', 'user_id',

    ];



    public function user()
    {

        return $this->belongsTo(User::class);

    }


    public function speedrecord()
    {

        return $this->hasMany(SpeedRecord::class);
        
    }
}
