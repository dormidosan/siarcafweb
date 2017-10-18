<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	

    public function asambleistas()
    {
        return $this->hasMany('App\Asambleista');
    }

    //LLAVES FORANEAS
	public function persona()
    {
        return $this->belongsTo('App\Persona');
    }

    public function rol()
    {
        return $this->belongsTo('App\Rol');
    }
	
	
	
	
}
