<?php

namespace App\Http\Controllers;

use App\Periodo;
use App\Peticion;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Routing\Redirector;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\TipoDocumento;
use App\Documento;
use App\Http\Requests\DocumentoRequest;


class DocumentoController extends Controller
{
    public function busqueda()
    {
        $nombre_documento = null ;
        $tipo_documento = null ;
        $periodo = null;
        $descripcion = null;
        $tipo_documentos = TipoDocumento::where('id', '!=', '0')->pluck('tipo', 'id'); 
        $periodos = Periodo::where('id', '!=', '0')->pluck('nombre_periodo', 'id'); 

        return view('General.BusquedaDocumentos')        
        ->with('periodo', $periodo)
        ->with('periodos', $periodos)
        ->with('descripcion', $descripcion)
        ->with('tipo_documento', $tipo_documento)
        ->with('tipo_documentos', $tipo_documentos)
        ->with('nombre_documento', $nombre_documento);


    }

    public function buscar_documentos(Request $request)
    {
        //se obtienen los inputs
        //dd($request->all());
        $nombre_documento = $request->get("nombre_documento");
        $tipo_documento = $request->get("tipo_documento");
        $periodo = $request->get("periodo");
        $descripcion = $request->get("descripcion");

        //variables generales
        $disco = "../storage/documentos/";
        $tipo_documentos = TipoDocumento::where('id', '!=', '0')->pluck('tipo', 'id'); 
        $periodos = Periodo::where('id', '!=', '0')->pluck('nombre_periodo', 'id'); 


        if (empty($periodo)) {
            $documentos = Documento::join("seguimientos", "seguimientos.documento_id", "=", "documentos.id")
                ->join("peticiones", "seguimientos.peticion_id", "=", "peticiones.id")
                ->where("documentos.tipo_documento_id", $tipo_documento)
                ->where("documentos.nombre_documento", "LIKE", "%" . $nombre_documento . "%")
                ->where("peticiones.descripcion", "LIKE", "%" . $descripcion . "%")
                ->get();
        } else {
            $documentos = Documento::join("seguimientos", "seguimientos.documento_id", "=", "documentos.id")
                ->join("peticiones", "seguimientos.peticion_id", "=", "peticiones.id")
                ->where("documentos.tipo_documento_id", $tipo_documento)
                ->where("documentos.nombre_documento", "LIKE", "%" . $nombre_documento . "%")
                ->where("peticiones.descripcion", "LIKE", "%" . $descripcion . "%")
                ->where("documentos.periodo_id", $periodo)
                ->get();
        }

        return view('General.BusquedaDocumentos')   
        ->with('disco', $disco)  
        ->with('documentos', $documentos)   
        ->with('periodo', $periodo)
        ->with('periodos', $periodos)
        ->with('descripcion', $descripcion)     
        ->with('tipo_documento', $tipo_documento)
        ->with('tipo_documentos', $tipo_documentos)
        ->with('nombre_documento', $nombre_documento);

    }


    public function descargar_documento($id)
    {
        $documento = Documento::find($id);
        $ruta_documento = "../storage/documentos/" . $documento->path;
        return response()->download($ruta_documento);
    }
}
