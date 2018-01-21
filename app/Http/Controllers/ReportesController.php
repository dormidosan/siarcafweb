<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReportesRequest;
use App\Http\Requests\ReportesPermisosTemporalesRequest;
use App\Http\Requests\ReportesPermisosPermanentesRequest;
use App\Http\Requests\BuscarBitacoraCorrespRequest;
use App\Http\Requests\ReportesAsistenciasRequest;
use App\Http\Requests\ReportesConsolidadosRentaRequest;
use Illuminate\Support\Facades\DB;
use PHPJasperXML;
use Response;
use App\Asambleista;
use Carbon\Carbon;
use App\Peticion;
use Dompdf\Dompdf;
use Dompdf\Options;


class ReportesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function Reporte_permisos_temporales($tipo) 
    {

   











        $parametros = explode('.', $tipo);
        $tipodes=$parametros[0];
        $idagenda=$parametros[1];
        $idperiodo=$parametros[2];
        $fecha=$parametros[3];

        $nombreperiodo1=DB::table('periodos')
        ->where('periodos.id','=',$idperiodo)
        ->select('periodos.nombre_periodo')
        ->get();

        $nombreperiodo=$nombreperiodo1[0]->nombre_periodo;
        //dd($nombreperiodo);

        

         $resultados=DB::table('asistencias')
        ->join('asambleistas','asistencias.asambleista_id','=','asambleistas.id')
        ->join('users','asambleistas.user_id','=','users.id')
        ->join('personas','users.persona_id','=','personas.id')
        ->where('asistencias.agenda_id','=',$idagenda)//por el momento solo filtro por el id
        ->where('asistencias.estado_asistencia_id','=',1)//1 por ser permisos temporales 
        ->select('personas.primer_apellido','personas.primer_nombre','personas.segundo_apellido',
                 'personas.segundo_nombre','asistencias.entrada','asistencias.salida','asistencias.propietario')
        ->get();
        


       
        $view =  \View::make('Reportes/Reporte_permisos_temporales_pdf', compact('resultados','fecha'))->render();
        $pdf = \App::make('dompdf.wrapper');      
        //$pdf->loadHTML($view)->setOrientation('landscape'); // cambiar tamaño y orientacion del papel
        $pdf->loadHTML($view)->setPaper('letter','landscape')->setWarnings(false);

        if($tipodes==1)
        {
            return $pdf->stream('reporte');
        }
        if($tipodes==2)
        {
            return $pdf->download('reporte.pdf'); 
        }



    }

    public function Reporte_permisos_permanentes($tipo) 
    {

      //dd($tipo);
      $parametros = explode('.', $tipo);
        $tipodes=$parametros[0];
        $fechainicial=$parametros[1];
        $fechafinal=$parametros[2];


$resultados = DB::table('permisos')
->join('asambleistas','permisos.asambleista_id','=','asambleistas.id')
->join('users','asambleistas.user_id','=','users.id')   
->join('personas','users.persona_id','=','personas.id')
->where
([
  ['permisos.fecha_permiso','>=',$fechainicial],
  ['permisos.fecha_permiso','<=',$fechafinal]
])
->select('personas.primer_apellido','personas.primer_nombre','personas.segundo_apellido',
'personas.segundo_nombre','personas.dui','personas.nit','personas.afp','personas.cuenta','permisos.motivo',
'permisos.fecha_permiso','permisos.inicio','permisos.fin')
->get();

//dd($resultados);

        $view =  \View::make('Reportes/Reporte_permisos_permanentes_pdf', compact('resultados','fechainicial','fechafinal'))->render();
        $pdf = \App::make('dompdf.wrapper');      
        $pdf->loadHTML($view)->setPaper('letter','landscape')->setWarnings(false);

        if($tipodes==1)
        {
            return $pdf->stream('reporte');
        }
        if($tipodes==2)
        {
            return $pdf->download('reporte.pdf'); 
        }

        //return $pdf->stream('invoice.pdf'); //mostrar pdf en pagina
        //return $pdf->download('invoice.pdf'); // descargar el archivo pdf


    }

    

        public function Reporte_asistencias_sesion_plenaria($tipo) 
    {
      
       
        $parametros = explode('.', $tipo);
        $tipodes=$parametros[0];
        $sector=$parametros[1];
        $idagenda=$parametros[2];
        $fecheperiodo=$parametros[3];
        $idperiodo=$parametros[4];

        $nombreperiodo1=DB::table('periodos')
        ->where('periodos.id','=',$idperiodo)
        ->select('periodos.nombre_periodo')
        ->get();

        $nombreperiodo=$nombreperiodo1[0]->nombre_periodo;
        //dd($nombreperiodo);

        if($sector=='E'){

         $resultados=DB::table('asistencias')
        ->join('asambleistas','asistencias.asambleista_id','=','asambleistas.id')
        ->join('users','asambleistas.user_id','=','users.id')
        ->join('personas','users.persona_id','=','personas.id')
        ->join('facultades','asambleistas.facultad_id','=','facultades.id')
        ->where('asistencias.agenda_id','=',$idagenda)//por el momento solo filtro por el id
        ->where('asistencias.estado_asistencia_id','=',3)//3 por ser asistencias normales 
        ->where('asambleistas.sector_id','=',1)//sector estudiantil
        ->select('personas.primer_apellido','personas.primer_nombre','personas.segundo_apellido',
                 'personas.segundo_nombre','asistencias.entrada','asistencias.salida','asistencias.propietario','facultades.nombre')
        ->orderBy('facultades.nombre', 'desc')

        ->get();
        $sector='ESTUDIANTIL';
}


        if($sector=='D'){

         $resultados=DB::table('asistencias')
        ->join('asambleistas','asistencias.asambleista_id','=','asambleistas.id')
        ->join('users','asambleistas.user_id','=','users.id')
        ->join('personas','users.persona_id','=','personas.id')
        ->join('facultades','asambleistas.facultad_id','=','facultades.id')
        ->where('asistencias.agenda_id','=',$idagenda)//por el momento solo filtro por el id
        ->where('asistencias.estado_asistencia_id','=',3)//3 por ser asistencias normales 
        ->where('asambleistas.sector_id','=',2)//sector estudiantil
        ->select('personas.primer_apellido','personas.primer_nombre','personas.segundo_apellido',
                 'personas.segundo_nombre','asistencias.entrada','asistencias.salida','asistencias.propietario','facultades.nombre')
        ->orderBy('facultades.nombre', 'desc')

        ->get();
        $sector='DOCENTE';
}


        if($sector=='ND'){

         $resultados=DB::table('asistencias')
        ->join('asambleistas','asistencias.asambleista_id','=','asambleistas.id')
        ->join('users','asambleistas.user_id','=','users.id')
        ->join('personas','users.persona_id','=','personas.id')
        ->join('facultades','asambleistas.facultad_id','=','facultades.id')
        ->where('asistencias.agenda_id','=',$idagenda)//por el momento solo filtro por el id
        ->where('asistencias.estado_asistencia_id','=',3)//3 por ser asistencias normales 
        ->where('asambleistas.sector_id','=',3)//sector estudiantil
        ->select('personas.primer_apellido','personas.primer_nombre','personas.segundo_apellido',
                 'personas.segundo_nombre','asistencias.entrada','asistencias.salida','asistencias.propietario','facultades.nombre')
        ->orderBy('facultades.nombre', 'desc')

        ->get();
        $sector='NO DOCENTE';
}







        $view =  \View::make('Reportes/Reporte_asistencias_sesion_plenaria_pdf', compact('resultados','sector','nombreperiodo'))->render();
        $pdf = \App::make('dompdf.wrapper');      
         $pdf->loadHTML($view)->setPaper('letter','landscape')->setWarnings(false);

        if($tipodes==1)
        {
            return $pdf->stream('reporte');
        }
        if($tipodes==2)
        {
            return $pdf->download('reporte.pdf'); 
        }

        //return $pdf->stream('invoice.pdf'); //mostrar pdf en pagina
        //return $pdf->download('invoice.pdf'); // descargar el archivo pdf


    }

          public function Reporte_inasistencias_sesion_plenaria_pdf($tipo) 
    {
      
        $data = $this->getData();
        $date = date('Y-m-d');
        $invoice = "2222";
        $view =  \View::make('Reportes/Reporte_inasistencias_sesion_plenaria_pdf', compact('data', 'date', 'invoice'))->render();
        $pdf = \App::make('dompdf.wrapper');      
        $pdf->loadHTML($view)->setPaper('letter','landscape')->setWarnings(false);

        if($tipo==1)
        {
            return $pdf->stream('reporte');
        }
        if($tipo==2)
        {
            return $pdf->download('reporte.pdf'); 
        }

        //return $pdf->stream('invoice.pdf'); //mostrar pdf en pagina
        //return $pdf->download('invoice.pdf'); // descargar el archivo pdf


    }


    

      public function Reporte_bitacora_correspondencia($tipo) 
    {
      
      //dd($tipo);

         $parametros = explode('.', $tipo);

  
         $tipodes=$parametros[0];
         $fechainicial=$parametros[1];
         $fechafinal= $parametros[2];


        $resultados = DB::table('peticiones')
        ->where
        ([
        ['peticiones.fecha','>=',$fechainicial],
        ['peticiones.fecha','<=',$fechafinal]
        ])
        ->get();

        $view =  \View::make('Reportes/Reporte_bitacora_correspondencia_pdf', 
                  compact('resultados', 'fechainicial', 'fechafinal'))->render();
        $pdf = \App::make('dompdf.wrapper');      
        //$pdf->loadHTML($view)->setPaper('a4')->setOrientation('landscape'); // cambiar tamaño y orientacion del papel
         $pdf->loadHTML($view)->setPaper('letter','portrait')->setWarnings(false);

        if($tipodes==1)
        {
            return $pdf->stream('reporte');
        }
        if($tipodes==2)
        {
            return $pdf->download('reporte.pdf'); 
        }

        //return $pdf->stream('invoice.pdf'); //mostrar pdf en pagina
        //return $pdf->download('invoice.pdf'); // descargar el archivo pdf


    }

public function buscar_consolidados_renta(ReportesConsolidadosRentaRequest $request){
//dd($request->all());
$tipo=$request->tipoDocumento;
$sector=$request->tipoDocumento;
$fechainicial=$request->fecha1;
$fechafinal=$request->fecha2;




  


        if($sector=='D'){

        
        $sector='DOCENTE';
}


        if($sector=='ND'){

     
        $sector='NO DOCENTE';
}

     



        $resultados=DB::table('agendas')
        ->join('asistencias','asistencias.agenda_id','=','agendas.id')
        ->where('asistencias.estado_asistencia_id','=',3)//3 por ser asistencias 
        ->where
([
  ['agendas.fecha','>=',$this->convertirfecha($fechainicial)],
  ['agendas.fecha','<=',$this->convertirfecha($fechafinal)]
])
->select('agendas.id','agendas.fecha','agendas.periodo_id')
->distinct()
->get();

        
        return view("Reportes.Reporte_consolidados_renta")
         ->with('resultados',$resultados)
         ->with('sector',$sector)
         ->with('tipo',$tipo);



}
  



    public function buscar_planilla_dieta(ReportesRequest $request){

       //dd($request->all());
   
        
        $mes=$this->numero_mes($request->fecha1);

        $mesnum=$request->fecha1;



       //dd($agenda);

       if($request->tipoDocumento=='A'){

        $resultados = DB::table('dietas')
        ->join('asambleistas','dietas.asambleista_id','=','asambleistas.id')
        ->join('users','asambleistas.user_id','=','users.id')
        ->join('sectores','asambleistas.sector_id','=','sectores.id')
        ->join('personas','users.persona_id','=','personas.id')
        ->where('dietas.mes','=', $mes)
        ->where('dietas.anio','=', $request->anio)
        ->where('personas.primer_nombre','like', '%'.$request->nombre.'%')
        ->select('personas.primer_apellido','personas.primer_nombre','personas.segundo_apellido',
                 'personas.segundo_nombre','dietas.mes','dietas.anio','sectores.id','sectores.nombre','dietas.asambleista_id')->get();

        //dd($resultados);

         return view("Reportes.Reporte_planilla_dieta")
         ->with('resultados',$resultados)
         ->with('mesnum',$mesnum)
         ->with('tipo',$request->tipoDocumento);
}


  if($request->tipoDocumento=='D'){
 
        $resultados = DB::table('dietas')
        ->join('asambleistas','dietas.asambleista_id','=','asambleistas.id')
        ->join('users','asambleistas.user_id','=','users.id')
        ->join('sectores','asambleistas.sector_id','=','sectores.id')
        ->join('personas','users.persona_id','=','personas.id')
        ->where('dietas.mes','=', $mes)
        ->where('dietas.anio','=', $request->anio)
        ->where('sectores.id','=', 2)
        ->select('personas.primer_apellido','personas.primer_nombre','personas.segundo_apellido',
                 'personas.segundo_nombre','dietas.mes','dietas.anio','sectores.id','sectores.nombre')->get();

         return view("Reportes.Reporte_planilla_dieta")
         ->with('resultados',$resultados)
         ->with('mesnum',$mesnum)
         ->with('tipo',$request->tipoDocumento);
}

  if($request->tipoDocumento=='ND'){

        $resultados = DB::table('dietas')
        ->join('asambleistas','dietas.asambleista_id','=','asambleistas.id')
        ->join('users','asambleistas.user_id','=','users.id')
        ->join('sectores','asambleistas.sector_id','=','sectores.id')
        ->join('personas','users.persona_id','=','personas.id')
        ->where('dietas.mes','=', $mes)
        ->where('dietas.anio','=', $request->anio)
        ->where('sectores.id','=', 3)
        ->select('personas.primer_apellido','personas.primer_nombre','personas.segundo_apellido',
                 'personas.segundo_nombre','dietas.mes','dietas.anio','sectores.id','sectores.nombre')->get();

         return view("Reportes.Reporte_planilla_dieta")
         ->with('resultados',$resultados)
         ->with('mesnum',$mesnum)
         ->with('tipo',$request->tipoDocumento);
}
       /* $dieta = DB::table('dietas')
        ->join('asambleistas','dietas.asambleista_id','=','asambleistas.id')
        ->join('users','asambleistas.user_id','=','users.id')
        ->whereColumn(['users.name','like', $request->nombre],
                      ['dietas.mes','=',$mes])->select('users.name')->first();*/

        
        

            //echo($dieta->name);

         
      
     return view("Reportes.Reporte_planilla_dieta",['resultados'=>NULL]);
    }


       public function buscar_permisos_temporales(ReportesPermisosTemporalesRequest $request){

        
      //  dd($request->all());


        $fechainicial=$request->fecha1;
        $fechafinal=$request->fecha2;
        
        
       // $fechainicial=date('Y-m-d');
       //$fechafinal=date('Y-m-d');
       // dd($fechafinal);
//if($request->nombre==''){


      /*  $resultados = DB::table('asambleistas')
        ->join('users','asambleistas.user_id','=','users.id')
        ->join('personas','users.persona_id','=','personas.id')
        ->join('permisos','permisos.asambleista_id','=','asambleistas.id')
        ->whereBetween('permisos.fecha_permiso', [$fechainicial,$fechafinal])
        ->select('personas.primer_apellido','personas.primer_nombre','personas.segundo_apellido',
                 'personas.segundo_nombre')->limit(1)->get();*/



         $resultados=DB::table('agendas')
        ->join('asistencias','asistencias.agenda_id','=','agendas.id')
        ->where('asistencias.estado_asistencia_id','=',1)//1 por ser permisos temporales 
        ->where
([
  ['agendas.fecha','>=',$this->convertirfecha($fechainicial)],
  ['agendas.fecha','<=',$this->convertirfecha($fechafinal)]
])
->select('agendas.id','agendas.fecha','agendas.periodo_id')
->distinct()
        ->get();




       /* $resultados=DB::table('asistencias')
        ->where('asistencias.agenda_id','=',2)//por el momento solo filtro por el id
        ->where('asistencias.estado_asistencia_id','=',1)//1 por ser permisos temporales 
        ->limit(1)
        ->get();*/


        return view("Reportes.Reporte_permisos_temporales")
         ->with('resultados',$resultados);

      // dd($resultados);
/*
        $resultados = Asambleista::join('users','asambleistas.user_id','=','users.id')
        ->join('personas','users.persona_id','=','personas.id')
        ->join('permisos','permisos.asambleista_id','=','asambleistas.id')
        ->where('permisos.fecha_permiso','=>', $fechainicial)
        ->select('personas.primer_apellido','personas.primer_nombre','personas.segundo_apellido',
                 'personas.segundo_nombre')->limit(1)->get();*/
/*
->where('permisos.fecha_permiso','=>', $fechainicial)
        ->where('permisos.fecha_permiso','=<', $fechafinal)
 $resultados = DB::table('dietas')
        ->join('asambleistas','dietas.asambleista_id','=','asambleistas.id')
        ->join('users','asambleistas.user_id','=','users.id')
        ->join('sectores','asambleistas.sector_id','=','sectores.id')
        ->join('personas','users.persona_id','=','personas.id')
        ->select('personas.primer_apellido','personas.primer_nombre','personas.segundo_apellido',
                 'personas.segundo_nombre','dietas.mes','dietas.anio','sectores.id','sectores.nombre','dietas.asambleista_id')->limit(1)->get();

*/
/*
if(!($resultados==NULL)){
         return view("Reportes.Reporte_permisos_temporales")
         ->with('resultados',$resultados);
}

}

else{
        $resultados = DB::table('dietas')
        ->join('asambleistas','dietas.asambleista_id','=','asambleistas.id')
        ->join('users','asambleistas.user_id','=','users.id')
        ->join('sectores','asambleistas.sector_id','=','sectores.id')
        ->join('personas','users.persona_id','=','personas.id')        
        ->select('personas.primer_apellido','personas.primer_nombre','personas.segundo_apellido',
                 'personas.segundo_nombre','dietas.mes','dietas.anio','sectores.id','sectores.nombre','dietas.asambleista_id')->limit(1)->get();


if(!($resultados==NULL)){
         return view("Reportes.Reporte_permisos_temporales")
         ->with('resultados',$resultados)
         ->with('tipo',$request->tipoDocumento);
}

}
*/

      return view("Reportes.Reporte_permisos_temporales",['resultados'=>NULL]);
    }


 public function buscar_asistencias(ReportesAsistenciasRequest $request){

        
       // dd($request->all());


        $fechainicial=$request->fecha1;
        $fechafinal=$request->fecha2;
        
        $sector=$request->tipoDocumento;
        $tipo=$request->tipoDocumento;
        
      


     if($sector=='E'){

     
        $sector='ESTUDIANTIL';
}


        if($sector=='D'){

        
        $sector='DOCENTE';
}


        if($sector=='ND'){

     
        $sector='NO DOCENTE';
}

     



        $resultados=DB::table('agendas')
        ->join('asistencias','asistencias.agenda_id','=','agendas.id')
        ->where('asistencias.estado_asistencia_id','=',3)//3 por ser asistencias 
        ->where
([
  ['agendas.fecha','>=',$this->convertirfecha($fechainicial)],
  ['agendas.fecha','<=',$this->convertirfecha($fechafinal)]
])
->select('agendas.id','agendas.fecha','agendas.periodo_id')
->distinct()
        ->get();

        
        return view("Reportes.Reporte_asistencias_sesion_plenaria")
         ->with('resultados',$resultados)
         ->with('sector',$sector)
         ->with('tipo',$tipo);

 

      return view("Reportes.Reporte_asistencias_sesion_plenaria",['resultados'=>NULL]);
    }


    



 public function buscar_bitacora_correspondencia(BuscarBitacoraCorrespRequest $request){

$fechainicial=$request->fecha1;
//dd($fechainicial);
//$fechainicial=str_replace('/','-',$fechainicial);
//$fecha = DateTime::createFromFormat('Y-m-d', $fechainicial);
//$fechainicial = $fecha->format('Y-m-d');

/*$fecha1conver= explode('/', $fechainicial); si sirve
$fechatrans=$fecha1conver[2].'-'.$fecha1conver[1].'-'.$fecha1conver[0];
$fechainicial = date('Y-m-d', strtotime($fechatrans));*/

//dd($this->convertirfecha($fechainicial));

//$fechainicial =strtotime($fechainicial);
$fechafinal=$request->fecha2;

//$fechafinal=str_replace('/','-',$fechafinal);
//$fechafinal = date('Y-m-d', strtotime($fechafinal));



$resultados = DB::table('peticiones')
->where
([
  ['peticiones.fecha','>=',$this->convertirfecha($fechainicial)],
  ['peticiones.fecha','<=',$this->convertirfecha($fechafinal)]
])
->limit(1)
->get();




/*$resultados = DB::table('peticiones')
->where('peticiones.id','=',1)
->get();*/

//dd($fechainicial);
//dd($request->all());
//dd($resultados);

if(!($resultados==NULL)){
    $uno=$this->convertirfecha($fechainicial);
    $dos=$this->convertirfecha($fechafinal);
         return view("Reportes.Reporte_bitacora_correspondencia")
         ->with('fechainicial',$uno)
         ->with('fechafinal',$dos)
         ->with('resultados',$resultados);
}

return view('Reportes.Reporte_bitacora_correspondencia',['resultados'=>NULL]);



 }

public function porcAsistencia($idAsambleista,$idSesion,$tipoasistencia){

    $horasreunion=DB::table('reuniones')
        ->selectRaw('ABS(sum(time_to_sec(timediff(inicio,fin)))/3600) as suma') 
        ->where('reuniones.id','=',$idSesion) //por el momento solo filtro por el id 
        ->where('reuniones.vigente','<>',1) //este where tiene que ir para no mostrar reuniones no terminadas        
        ->get();


    $horasasistencia=DB::table('asistencias')
        ->selectRaw('ABS(sum(time_to_sec(timediff(entrada,salida)))/3600) as suma') 
        ->where('asistencias.asambleista_id','=',$idAsambleista) 
        ->where('asistencias.agenda_id','=',$idSesion)//por el momento solo filtro por el id
        ->where('asistencias.estado_asistencia_id','=',$tipoasistencia) 
        ->get();
        
$porcAsistencia=($horasasistencia[0]->suma/$horasreunion[0]->suma)*100;


return $porcAsistencia; 

}


      public function Reporte_planilla_dieta($tipo) 
    {
      
        $parametros = explode('.', $tipo); //se reciben id asambleista mes y año de la dieta separados por un espacio
        $verdescar=$parametros[0];
        $id=$parametros[1];
        $mes=$parametros[2];
        $anio=$parametros[3];
        $mesnum=$parametros[4];



       /* $agenda=DB::table('agendas')     //agendas del mes y año seleccionado
        ->whereMonth('fecha','=',$mesnum)
        ->whereYear('fecha','=',$anio)
        ->get();

        dd($agenda);*/



        $busqueda = DB::table('asambleistas')
        ->join('users','asambleistas.user_id','=','users.id')
        ->join('sectores','asambleistas.sector_id','=','sectores.id')
        ->join('personas','users.persona_id','=','personas.id')
        ->where('asambleistas.id','=', $id)
        ->select('personas.primer_apellido','personas.primer_nombre','personas.segundo_apellido',
                 'personas.segundo_nombre','sectores.nombre','personas.dui',
                 'personas.nit','personas.afp','personas.cuenta')->first();
      


        $horasreunion=DB::table('reuniones')
        ->selectRaw('ABS(sum(time_to_sec(timediff(inicio,fin)))/3600) as suma') 
        ->where('reuniones.id','=',1) //por el momento solo filtro por el id 
        ->where('reuniones.vigente','<>',1) //este where tiene que ir para no mostrar reuniones no terminadas        
        ->get();

$horasasistencia=DB::table('asistencias')
        ->selectRaw('ABS(sum(time_to_sec(timediff(entrada,salida)))/3600) as suma') 
        ->where('asistencias.asambleista_id','=',1) 
        ->where('asistencias.agenda_id','=',1)//por el momento solo filtro por el id
        ->where('asistencias.estado_asistencia_id','=',3) 
        ->get();
        

$porcAsistencia=($horasasistencia[0]->suma/$horasreunion[0]->suma)*100;

//$porcAsistencia=this->porcAsistencia($id,);

//dd($porcAsistencia);





if($porcAsistencia<80){



}



$iva=0.0;
$porcentaje_asistencia=0.0;
$renta=0.0;
$monto_dieta=0.0;

$parametros=DB::table('parametros')->get();

foreach ($parametros as $parametro) {

if($parametro->nombre_parametro=='iva'){ 
    $iva=$parametro->valor;
}

if($parametro->nombre_parametro=='porcentaje_asistencia'){ 
    $porcentaje_asistencia=($parametro->valor)*100;
}

if($parametro->nombre_parametro=='renta'){ 
    $renta=$parametro->valor;
}

if($parametro->nombre_parametro=='monto_dieta'){ 
    $monto_dieta=$parametro->valor;
}
//echo($parametro->nombre_parametro);
//$prueba=$parametro->nombre_parametro;
}
//dd($parametros);
//dd($prueba);
//dd($iva,$porcentaje_asistencia,$renta,$monto_dieta);
if($porcAsistencia<=$porcentaje_asistencia){ // se generara planilla de dieta si alcanza el porcentage de asistencia

//retorn

}

$renta=$monto_dieta-$monto_dieta/($renta+1);
$renta=round($renta,2);

//dd($renta);
    //dd($horasreunion);
    //dd($horasasistencia);
     

        $nombre1=$busqueda->primer_nombre;
        $nombre2=$busqueda->segundo_nombre;
        $apellido1=$busqueda->primer_apellido;
        $apellido2=$busqueda->segundo_apellido;

        $sector=$busqueda->nombre;
        $dui=$busqueda->dui;
        $nit=$busqueda->nit;
        $afp=$busqueda->afp;
        $cuenta=$busqueda->cuenta;

        $nombrecompleto=$nombre1.' '.$nombre2.' '.$apellido1.' '.$apellido2;

        //dd($nombrecompleto,$dui,$nit,$mes,$anio,$sector);

        $view =\View::make('Reportes/Reporte_planilla_dieta_pdf', compact('nombrecompleto','sector','nit', 'mes', 'anio','horasreunion','monto_dieta','renta'))->render();
        $pdf =\App::make('dompdf.wrapper');      
        //$pdf->loadHTML($view)->setPaper('a4')->setOrientation('landscape'); // cambiar tamaño y orientacion del papel
        $pdf->loadHTML($view)->setPaper('letter','portrait')->setWarnings(false);

         if($verdescar==1)
        {
            return $pdf->stream('reporte');
        }
        if($verdescar==2)
        {
            return $pdf->download('reporte.pdf'); 
        }
        //return $pdf->stream('reporte.pdf'); //mostrar pdf en pagina
        //return $pdf->download('reporte.pdf'); // descargar el archivo pdf
    } 

public function Reporte_planilla_dieta_prof_Doc_pdf($tipo) 
    {
      
      
        $parametros = explode('.', $tipo); //se reciben id asambleista mes y año de la dieta separados por un espacio
        $verdescar=$parametros[0];
        $mes=$parametros[1];
        $anio=$parametros[2];


     $resultados = DB::table('dietas')
        ->join('asambleistas','dietas.asambleista_id','=','asambleistas.id')
        ->join('users','asambleistas.user_id','=','users.id')
        ->join('sectores','asambleistas.sector_id','=','sectores.id')
        ->join('personas','users.persona_id','=','personas.id')
        ->join('facultades','asambleistas.facultad_id','=','facultades.id')
        ->where('dietas.mes','=', $mes)
        ->where('dietas.anio','=', $anio)
        ->where('sectores.id','=', 2)
        ->select('personas.primer_apellido','personas.primer_nombre','personas.segundo_apellido',
                 'personas.segundo_nombre','dietas.mes','dietas.anio','sectores.id','sectores.nombre as nom_sect',
                 'facultades.nombre as nom_fact')->orderBy('nom_fact', 'desc')->get();


        
        $view =  \View::make('Reportes/Reporte_planilla_dieta_prof_Doc_pdf', compact('resultados','mes','anio'))->render();
        $pdf = \App::make('dompdf.wrapper');      
        $pdf->loadHTML($view)->setPaper('letter','landscape')->setWarnings(false);

        if($verdescar==1)
        {
            return $pdf->stream('reporte');
        }
        if($verdescar==2)
        {
            return $pdf->download('reporte.pdf'); 
        }

        //return $pdf->stream('invoice.pdf'); //mostrar pdf en pagina
        //return $pdf->download('invoice.pdf'); // descargar el archivo pdf


    }


     public function Reporte_planilla_dieta_prof_noDocpdf($tipo) 
    {
        /* para jasper report
        $parametros = explode('.', $tipo); //se reciben id asambleista mes y año de la dieta separados por un espacio
        $verdescar=$parametros[0];
        $mes=$parametros[1];
        $anio=$parametros[2];
        $server="localhost";
        $db="siarcaf";
        $user="root";
        $pass="";
        $version="0.8b";
        $pgport=5432;
        $pchartfolder="./class/pchart2"; 
//display errors should be off in the php.ini file
//ini_set('display_errors', 0);
//setting the path to the created jrxml file
$xml =  simplexml_load_file("C:/xampp/htdocs/siarcaf/resources/views/Reportes/Reporte_planilla_dieta_prof_noDocpdf.jrxml");
$PHPJasperXML = new PHPJasperXML();
//$PHPJasperXML->debugsql=true;
//dd($mes12);

$PHPJasperXML->arrayParameter=array("mes1"=>"'$mes'");


//dd($sql);
//$PHPJasperXML->sql = $sql;
$PHPJasperXML->xml_dismantle($xml);
$dbdriver="mysql";
$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db,$dbdriver);
//ob_end_clean();
//dd($PHPJasperXML);
if($verdescar==1)  //page output method I:standard output  D:Download file
        {
           
            $PHPJasperXML->outpage("I");
            //return Response::make($PHPJasperXML->outpage("I"));
        }
        if($verdescar==2)
        {
            
            $PHPJasperXML->outpage("D");
        }
 
*/
        $parametros = explode('.', $tipo); //se reciben id asambleista mes y año de la dieta separados por un espacio
        $verdescar=$parametros[0];
        $mes=$parametros[1];
        $anio=$parametros[2];

       $resultados = DB::table('dietas')
        ->join('asambleistas','dietas.asambleista_id','=','asambleistas.id')
        ->join('users','asambleistas.user_id','=','users.id')
        ->join('sectores','asambleistas.sector_id','=','sectores.id')
        ->join('personas','users.persona_id','=','personas.id')
        
        ->where('dietas.mes','=', $mes)
        ->where('dietas.anio','=', $anio)
        ->where('sectores.id','=', 3)
        ->select('personas.primer_apellido','personas.primer_nombre','personas.segundo_apellido',
                 'personas.segundo_nombre','dietas.mes','dietas.anio','sectores.id','sectores.nombre as nom_sect'
                 )->orderBy('primer_apellido', 'desc')->get();
        
       
        $view =  \View::make('Reportes/Reporte_planilla_dieta_prof_noDocpdf', compact('resultados','mes','anio'))->render();
        $pdf = \App::make('dompdf.wrapper');      
        $pdf->loadHTML($view)->setPaper('letter','landscape')->setWarnings(false);

        if($verdescar==1)
        {
            return $pdf->stream('reporte');
        }
        if($verdescar==2)
        {
            return $pdf->download('reporte.pdf'); 
        }
        

    }



 


      public function Reporte_consolidados_renta($tipo) //No docente
    {
      
        


        //dd($tipo);


        $parametros = explode('.', $tipo);
        $tipodes=$parametros[0];
        $sector=$parametros[1];
        $idagenda=$parametros[2];
        $fecheperiodo=$parametros[3];
        $idperiodo=$parametros[4];

        $nombreperiodo1=DB::table('periodos')
        ->where('periodos.id','=',$idperiodo)
        ->select('periodos.nombre_periodo')
        ->get();

        $nombreperiodo=$nombreperiodo1[0]->nombre_periodo;
        //dd($nombreperiodo);

       

        if($sector=='D'){

         $resultados=DB::table('asistencias')
        ->join('asambleistas','asistencias.asambleista_id','=','asambleistas.id')
        ->join('users','asambleistas.user_id','=','users.id')
        ->join('personas','users.persona_id','=','personas.id')
        ->join('facultades','asambleistas.facultad_id','=','facultades.id')
        ->where('asistencias.agenda_id','=',$idagenda)//por el momento solo filtro por el id
        ->where('asistencias.estado_asistencia_id','=',3)//3 por ser asistencias normales 
        ->where('asambleistas.sector_id','=',2)//sector estudiantil
        ->select('personas.primer_apellido','personas.primer_nombre','personas.segundo_apellido',
                 'personas.segundo_nombre','asistencias.entrada','asistencias.salida','asistencias.propietario','facultades.nombre','personas.nit')
        ->orderBy('facultades.nombre', 'desc')

        ->get();
        $sector='DOCENTE';
}


        if($sector=='ND'){

         $resultados=DB::table('asistencias')
        ->join('asambleistas','asistencias.asambleista_id','=','asambleistas.id')
        ->join('users','asambleistas.user_id','=','users.id')
        ->join('personas','users.persona_id','=','personas.id')
        ->join('facultades','asambleistas.facultad_id','=','facultades.id')
        ->where('asistencias.agenda_id','=',$idagenda)//por el momento solo filtro por el id
        ->where('asistencias.estado_asistencia_id','=',3)//3 por ser asistencias normales 
        ->where('asambleistas.sector_id','=',3)//sector estudiantil
        ->select('personas.primer_apellido','personas.primer_nombre','personas.segundo_apellido',
                 'personas.segundo_nombre','asistencias.entrada','asistencias.salida','asistencias.propietario','facultades.nombre','personas.nit')
        ->orderBy('facultades.nombre', 'desc')

        ->get();
        $sector='NO DOCENTE';
}







        $view =  \View::make('Reportes/Reporte_consolidados_renta_pdf', compact('resultados','sector','nombreperiodo'))->render();
        $pdf = \App::make('dompdf.wrapper');      
         $pdf->loadHTML($view)->setPaper('letter','landscape')->setWarnings(false);

        if($tipodes==1)
        {
            return $pdf->stream('reporte');
        }
        if($tipodes==2)
        {
            return $pdf->download('reporte.pdf'); 
        }



    }
    
    
    
      public function Reporte_consolidados_renta_docente($tipo) 
    {
      
     
  


        //dd($tipo);


        $parametros = explode('.', $tipo);
        $tipodes=$parametros[0];
        $sector=$parametros[1];
        $idagenda=$parametros[2];
        $fecheperiodo=$parametros[3];
        $idperiodo=$parametros[4];

        $nombreperiodo1=DB::table('periodos')
        ->where('periodos.id','=',$idperiodo)
        ->select('periodos.nombre_periodo')
        ->get();

        $nombreperiodo=$nombreperiodo1[0]->nombre_periodo;
        //dd($nombreperiodo);

       

        if($sector=='D'){

         $resultados=DB::table('asistencias')
        ->join('asambleistas','asistencias.asambleista_id','=','asambleistas.id')
        ->join('users','asambleistas.user_id','=','users.id')
        ->join('personas','users.persona_id','=','personas.id')
        ->join('facultades','asambleistas.facultad_id','=','facultades.id')
        ->where('asistencias.agenda_id','=',$idagenda)//por el momento solo filtro por el id
        ->where('asistencias.estado_asistencia_id','=',3)//3 por ser asistencias normales 
        ->where('asambleistas.sector_id','=',2)//sector estudiantil
        ->select('personas.primer_apellido','personas.primer_nombre','personas.segundo_apellido',
                 'personas.segundo_nombre','asistencias.entrada','asistencias.salida','asistencias.propietario','facultades.nombre','personas.nit')
        ->orderBy('facultades.nombre', 'desc')

        ->get();
        $sector='DOCENTE';
}


        if($sector=='ND'){

         $resultados=DB::table('asistencias')
        ->join('asambleistas','asistencias.asambleista_id','=','asambleistas.id')
        ->join('users','asambleistas.user_id','=','users.id')
        ->join('personas','users.persona_id','=','personas.id')
        ->join('facultades','asambleistas.facultad_id','=','facultades.id')
        ->where('asistencias.agenda_id','=',$idagenda)//por el momento solo filtro por el id
        ->where('asistencias.estado_asistencia_id','=',3)//3 por ser asistencias normales 
        ->where('asambleistas.sector_id','=',3)//sector estudiantil
        ->select('personas.primer_apellido','personas.primer_nombre','personas.segundo_apellido',
                 'personas.segundo_nombre','asistencias.entrada','asistencias.salida','asistencias.propietario','facultades.nombre','personas.nit')
        ->orderBy('facultades.nombre', 'desc')

        ->get();
        $sector='NO DOCENTE';
}







        $view =  \View::make('Reportes/Reporte_consolidados_renta_docente_pdf', compact('resultados','sector','nombreperiodo'))->render();
        $pdf = \App::make('dompdf.wrapper');      
         $pdf->loadHTML($view)->setPaper('letter','landscape')->setWarnings(false);

        if($tipodes==1)
        {
            return $pdf->stream('reporte');
        }
        if($tipodes==2)
        {
            return $pdf->download('reporte.pdf'); 
        }



    }
    

       public function Reporte_constancias_renta($tipo) 
    {
      
        $data = $this->getData();
        $date = date('Y-m-d');
        $invoice = "2222";

        dd($tipo);
        $view =  \View::make('Reportes/Reporte_permisos_permanentes_pdf', compact('data', 'date', 'invoice'))->render();
        $pdf = \App::make('dompdf.wrapper');      
        //$pdf->loadHTML($view)->setPaper('a4')->setOrientation('landscape'); // cambiar tamaño y orientacion del papel
        $pdf->loadHTML($view)->setPaper('letter','portrait')->setWarnings(false);

        if($tipo==1)
        {
            return $pdf->stream('reporte');
        }
        if($tipo==2)
        {
            return $pdf->download('reporte.pdf'); 
        }

        //return $pdf->stream('invoice.pdf'); //mostrar pdf en pagina
        //return $pdf->download('invoice.pdf'); // descargar el archivo pdf


    }

    

    
       public function Reporte_constancias_renta_JD($tipo) 
    {
      
        $data = $this->getData();
        $date = date('Y-m-d');
        $invoice = "2222";
        dd($tipo);
        $view =  \View::make('Reportes/Reporte_permisos_permanentes_pdf', compact('data', 'date', 'invoice'))->render();
        $pdf = \App::make('dompdf.wrapper');      
        //$pdf->loadHTML($view)->setPaper('a4')->setOrientation('landscape'); // cambiar tamaño y orientacion del papel
        $pdf->loadHTML($view)->setPaper('letter','portrait')->setWarnings(false);

        if($tipo==1)
        {
            return $pdf->stream('reporte');

        }
        if($tipo==2)
        {
            return $pdf->download('reporte.pdf'); 
        }

        //return $pdf->stream('invoice.pdf'); //mostrar pdf en pagina
        //return $pdf->download('invoice.pdf'); // descargar el archivo pdf


    }

     
       public function Reporte_Convocatorias($tipo) 
    {
      
        $data = $this->getData();
        $date = date('Y-m-d');
        $invoice = "2222";
        $view =  \View::make('Reportes/Reporte_Convocatorias_pdf', compact('data', 'date', 'invoice'))->render();
        $pdf = \App::make('dompdf.wrapper');      
        //$pdf->loadHTML($view)->setPaper('a4')->setOrientation('landscape'); // cambiar tamaño y orientacion del papel
        $pdf->loadHTML($view)->setPaper('letter','portrait')->setWarnings(false);

        if($tipo==1)
        {
            return $pdf->stream('reporte');
        }
        if($tipo==2)
        {
            return $pdf->download('reporte.pdf'); 
        }

        //return $pdf->stream('invoice.pdf'); //mostrar pdf en pagina
        //return $pdf->download('invoice.pdf'); // descargar el archivo pdf


    }

    public function buscar_permisos_permanentes(ReportesPermisospermanentesRequest $request){



$fechainicial=$request->fecha1;
//dd($fechainicial);
//$fechainicial=str_replace('/','-',$fechainicial);
//$fecha = DateTime::createFromFormat('Y-m-d', $fechainicial);
//$fechainicial = $fecha->format('Y-m-d');

/*$fecha1conver= explode('/', $fechainicial); si sirve
$fechatrans=$fecha1conver[2].'-'.$fecha1conver[1].'-'.$fecha1conver[0];
$fechainicial = date('Y-m-d', strtotime($fechatrans));*/

//dd($this->convertirfecha($fechainicial));

//$fechainicial =strtotime($fechainicial);
$fechafinal=$request->fecha2;

//$fechafinal=str_replace('/','-',$fechafinal);
//$fechafinal = date('Y-m-d', strtotime($fechafinal));



$resultados = DB::table('permisos')
->where
([
  ['permisos.fecha_permiso','>=',$this->convertirfecha($fechainicial)],
  ['permisos.fecha_permiso','<=',$this->convertirfecha($fechafinal)]
])
->limit(1)
->get();




/*$resultados = DB::table('peticiones')
->where('peticiones.id','=',1)
->get();*/

//dd($fechainicial);
//dd($request->all());
//dd($resultados);

if(!($resultados==NULL)){
    $uno=$this->convertirfecha($fechainicial);
    $dos=$this->convertirfecha($fechafinal);
         return view("Reportes.Reporte_permisos_permanentes")
         ->with('fechainicial',$uno)
         ->with('fechafinal',$dos)
         ->with('resultados',$resultados);
}




return view("Reportes.Reporte_permisos_permanentes",['resultados'=>NULL]);
    }

    

   // public function listado(){
   // return view("Reportes.listado_reportes");
  //  }


    public function getData() 
    {

        $data=Array(1);
        $data =  [
            'quantity'      => '1' ,
            'description'   => 'some ramdom text',
            'price'   => '500',
            'total'     => '500'
        ];

        
      

        return $data;
    }
    

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function convertirfecha($fecha){

$fecha1conver= explode('/', $fecha);
$fechatrans=$fecha1conver[2].'-'.$fecha1conver[1].'-'.$fecha1conver[0];
$fechainicial = date('Y-m-d', strtotime($fechatrans));

        return $fechainicial;
    }


    public function numero_mes($mesnum)
    {
        
        $mes=' ';
        if($mesnum==1){

            $mes='enero';
        }
        if($mesnum==2){

            $mes='febrero';
        }
        if($mesnum==3){

            $mes='marzo';
        }
        if($mesnum==4){

            $mes='abril';
        }
        if($mesnum==5){

            $mes='mayo';
        }
        if($mesnum==6){

            $mes='junio';
        }
        if($mesnum==7){

            $mes='julio';
        }
        if($mesnum==8){

            $mes='agosto';
        }
        if($mesnum==9){

            $mes='septiembre';
        }
        if($mesnum==10){

            $mes='octubre';
        }
        if($mesnum==11){

            $mes='noviembre';
        }
        if($mesnum==12){

            $mes='diciembre';
        }

        return $mes;
    }
}
