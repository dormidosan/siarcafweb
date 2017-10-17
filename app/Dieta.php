<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dieta extends Model
{
    //
	protected $table = 'dietas';

	public function asambleista()
    {
        return $this->belongsTo('App\Asambleista');
    }
	


}
