<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Propuesta extends Model
{
    //
	protected $table = 'propuestas';

	
	
	public function punto()
    {
        return $this->belongsTo('App\Punto');
    }


}
