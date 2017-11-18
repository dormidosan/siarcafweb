<?php

namespace App\Http\Controllers;

use App\Periodo;
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
        $tipo_documentos = TipoDocumento::all();
        $documentos = Documento::all(); //->paginate(10); para obtener ningun resultado ya que se pinta en blanco
        //dd($documentos);
        $periodos = Periodo::all();
        $disco = "../storage/documentos/";
        return view('General.BusquedaDocumentos', ['documentos' => $documentos, "disco" => $disco, "tipo_documentos" => $tipo_documentos, "periodos" => $periodos]);
    }

    public function buscar_documentos(Request $request)
    {
        $nombre_documento = $request->get("nombre_documento");
        $tipo_documento = $request->get("tipo_documento");
        $periodo = $request->get("periodo");
        $descripcion = $request->get("descripcion");

        //dd($request->all());
        $documentos = Documento::where('tipo_documento_id', '=', $tipo_documento)
            ->where("nombre_documento","LIKE",$nombre_documento."%")
            ->get();

        $disco = "../storage/documentos/";
        $tipo_documentos = TipoDocumento::all();
        $periodos = Periodo::all();

        //return redirect()->route("busqueda");
        return view('General.BusquedaDocumentos', ['documentos' => $documentos, "disco" => $disco, "tipo_documentos" => $tipo_documentos, "periodos" => $periodos]);
    }

    public function descargar_documento($id)
    {
        $documento = Documento::find($id);
        $ruta_documento = "../storage/documentos/" . $documento->path;
        return response()->download($ruta_documento);
    }
}
