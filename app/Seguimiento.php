<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
    //
	protected $table = 'seguimientos';

    //LLAVES FORANEAS
	public function peticion()
    {
        return $this->belongsTo('App\Peticion');
    }
	
	public function comision()
    {
        return $this->belongsTo('App\Comision');
    }


}
