<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    //
	protected $table = 'cargos';


	public function comision()
    {
        return $this->belongsTo('App\Comision');
    }
	
	public function asambleista()
    {
        return $this->belongsTo('App\Asambleista');
    }

}
