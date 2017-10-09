<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intervencion extends Model
{
    //
	protected $table = 'intervenciones';

	public function punto()
    {
        return $this->belongsTo('App\Punto');
    }


}
