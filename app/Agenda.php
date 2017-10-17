<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    //
	protected $table = 'agendas';



	public function puntos()
    {
        return $this->hasMany('App\Punto');
    }

    public function asistencias()
    {
        return $this->hasMany('App\Asistencia');
    }
	
	public function periodo()
    {
        return $this->hasOne('App\Periodo');
    }


}
