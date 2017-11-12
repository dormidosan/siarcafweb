<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use Illuminate\Routing\Redirector;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\TipoDocumento;
use App\Documento;

class BuscarDocumentoController extends Controller
{
    //

    public function busqueda(){

    	 $tipo_documentos = TipoDocumento::lists('tipo','id');

    	 $documentos = Documento::where('tipo_documento_id','=',0)->get(); //->paginate(10); para obtener ningun resultado ya que se pinta en blanco
         $disco = "../storage/documentos/";

        return view('General.BusquedaDocumentos')
        ->with('documentos',$documentos)
        ->with('disco',$disco)
        ->with('tipo_documentos',$tipo_documentos);
    }

    public function buscar_documento(Request $request,Redirector $redirect)
    {
		// SOLO BUSCAR POR TIPO ACTUALMENTE

    	$tipo_documentos = TipoDocumento::lists('tipo','id');
    	$documentos = Documento::where('tipo_documento_id','=',$request->tipo_documentos)->get(); //->paginate(10); //obtiene los documentos con este tipo
    	$disco = "../storage/documentos/";
    	//dd($documentos);
		//dd($request->all());

		return view('General.BusquedaDocumentos')
		->with('documentos',$documentos)
		->with('disco',$disco)
        ->with('tipo_documentos',$tipo_documentos);
    }

    public function descargar_documento($id)
    {
    	$documento= Documento::find($id);
    	$ruta_documento = "../storage/documentos/".$documento->path;
    	return response()->download($ruta_documento);
    }

}





