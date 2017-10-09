<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    //
	protected $table = 'permisos';


	public function asambleista()
    {
        return $this->belongsTo('App\Asambleista');
    }


}
