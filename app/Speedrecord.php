<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speedrecord extends Model
{
    protected $fillable = [

        'downloadfile_id','radar','locationtype','sp','km', 'runwaysense','dateofinfringement','allowedspeed','measuredspeed','photonumber', 'policeman',

    ];



    public function downloadfile()
    {

        return $this->belongsTo(Downloadfile::class);
        
    }
}
