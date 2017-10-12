<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    //
	protected $table = 'documentos';
	
	protected $fillable = ['nombre_documento', 'tipo_documentos', 'fecha_ingreso', 'path'];

	public function peticiones()
    {
        return $this->belongsToMany('App\Peticion','documento_peticion')->withTimestamps();
    }
	
	public function reuniones()
    {
        return $this->belongsToMany('App\Reunion','documento_reunion')->withTimestamps();
    }
	
	public function tipo_documento()
    {
        return $this->belongsTo('App\TipoDocumento');
    }
	
	public function periodo()
    {
        return $this->belongsTo('App\Periodo');
    }

}
