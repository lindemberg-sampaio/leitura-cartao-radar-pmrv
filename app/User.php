<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'graduation_id', 're', 'warname', 'cpf', 'rg', 'birthdate', 'admissiondate', 'email', 'password', 'activeservice', 'opm_id', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'activeservice' => 'boolean',
    ];


    public function opm()
    {

        return $this->belongsTo(Opm::class);
        
    }


    public function graduation()
    {

        return $this->belongsTo(Graduation::class);

    }


    public function downloadfile(){

        return $this->hasMany(Downloadfile::class);
        
    }
}
