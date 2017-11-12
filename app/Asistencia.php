<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    //
	protected $table = 'asistencias';


	//LLAVES FORANEAS
	public function agenda()
    {
        return $this->belongsTo('App\Agenda');
    }
	
	public function asambleista()
    {
        return $this->belongsTo('App\Asambleista');
    }

}
