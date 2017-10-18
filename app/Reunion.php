<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reunion extends Model
{
    //
	protected $table = 'reuniones';

	
	public function documentos()
    {
        return $this->belongsToMany('App\Documento','documento_reunion')->withTimestamps();
    }
	
    //LLAVES FORANEAS
	public function comision()
    {
        return $this->belongsTo('App\Comision');
    }
	
	public function periodo()
    {
        return $this->belongsTo('App\Periodo');
    }


}
