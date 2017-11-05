<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReportesRequest;
use Illuminate\Support\Facades\DB;
use PHPJasperXML;

use Response;

class ReportesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function Reporte_permisos_temporales($tipo) 
    {
      
        $data = $this->getData();
        $date = date('Y-m-d');
        $invoice = "2222";
        $view =  \View::make('Reportes/Reporte_permisos_temporales_pdf', compact('data', 'date', 'invoice'))->render();
        $pdf = \App::make('dompdf.wrapper');      
        //$pdf->loadHTML($view)->setPaper('a4')->setOrientation('landscape'); // cambiar tamaño y orientacion del papel
        $pdf->loadHTML($view);

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

    public function Reporte_permisos_permanentes($tipo) 
    {
      
        $data = $this->getData();
        $date = date('Y-m-d');
        $invoice = "2222";
        $view =  \View::make('Reportes/Reporte_permisos_permanentes_pdf', compact('data', 'date', 'invoice'))->render();
        $pdf = \App::make('dompdf.wrapper');      
        //$pdf->loadHTML($view)->setPaper('a4')->setOrientation('landscape'); // cambiar tamaño y orientacion del papel
        $pdf->loadHTML($view);

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

    

        public function Reporte_asistencias_sesion_plenaria($tipo) 
    {
      
        $data = $this->getData();
        $date = date('Y-m-d');
        $invoice = "2222";
        $view =  \View::make('Reportes/Reporte_asistencias_sesion_plenaria_pdf', compact('data', 'date', 'invoice'))->render();
        $pdf = \App::make('dompdf.wrapper');      
        $pdf->loadHTML($view)->setOrientation('landscape'); // cambiar tamaño y orientacion del papel
        $pdf->loadHTML($view);

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

          public function Reporte_inasistencias_sesion_plenaria_pdf($tipo) 
    {
      
        $data = $this->getData();
        $date = date('Y-m-d');
        $invoice = "2222";
        $view =  \View::make('Reportes/Reporte_inasistencias_sesion_plenaria_pdf', compact('data', 'date', 'invoice'))->render();
        $pdf = \App::make('dompdf.wrapper');      
        $pdf->loadHTML($view)->setOrientation('landscape'); // cambiar tamaño y orientacion del papel
        $pdf->loadHTML($view);

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
      
        $data = $this->getData();
        $date = date('Y-m-d');
        $invoice = "2222";
        $view =  \View::make('Reportes/Reporte_bitacora_correspondencia_pdf', compact('data', 'date', 'invoice'))->render();
        $pdf = \App::make('dompdf.wrapper');      
        //$pdf->loadHTML($view)->setPaper('a4')->setOrientation('landscape'); // cambiar tamaño y orientacion del papel
        $pdf->loadHTML($view);

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

  
    public function buscar_planilla_dieta(ReportesRequest $request){

       //dd($request->all());
      /*  $request->tipoDocumento
        $request->nombre
        $request->fecha1
        */

        //$users = DB::table('users')->get();
        //$dieta = DB::table('dietas')->where('mes', $request->nombre)->first();   
        
        /*$dieta = DB::table('dietas')
        ->join('asambleistas','dietas.asambleista_id','=','asambleistas.id')
        ->join('users','asambleistas.user_id','=','users.id')
        ->where('users.name','like', $request->nombre)->select('users.name')->first();*/

      // $mes1 = explode('/', $request->fecha1->format('d-m-y'));
        

      // echo('putas putas putas');
      // $mesnum=explode('/', $request->fecha1)[1];
        
        $mes=$this->numero_mes($request->fecha1);

       /* $dieta = DB::table('dietas')
        ->join('asambleistas','dietas.asambleista_id','=','asambleistas.id')
        ->join('users','asambleistas.user_id','=','users.id')
        ->where('users.name','LIKE', $request->nombre)->select('users.name')->first();*/

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

         return view("Reportes.Reporte_planilla_dieta")
         ->with('resultados',$resultados)
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

    
 
      public function Reporte_planilla_dieta($tipo) 
    {
      


        $parametros = explode(' ', $tipo); //se reciben id asambleista mes y año de la dieta separados por un espacio
        $verdescar=$parametros[0];
        $id=$parametros[1];
        $mes=$parametros[2];
        $anio=$parametros[3];


      

        $busqueda = DB::table('asambleistas')
        ->join('users','asambleistas.user_id','=','users.id')
        ->join('sectores','asambleistas.sector_id','=','sectores.id')
        ->join('personas','users.persona_id','=','personas.id')
        ->where('asambleistas.id','=', $id)
        ->select('personas.primer_apellido','personas.primer_nombre','personas.segundo_apellido',
                 'personas.segundo_nombre','sectores.nombre','personas.dui','personas.nit','personas.afp','personas.cuenta')->first();
      
       

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

      //  dd($nombrecompleto,$dui,$nit,$mes,$anio,$sector);

        $view =\View::make('Reportes/Reporte_planilla_dieta_pdf', compact('nombrecompleto','sector','nit', 'mes', 'anio'))->render();
        $pdf =\App::make('dompdf.wrapper');      
        //$pdf->loadHTML($view)->setPaper('a4')->setOrientation('landscape'); // cambiar tamaño y orientacion del papel
        $pdf->loadHTML($view);

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
      
      
        $parametros = explode(' ', $tipo); //se reciben id asambleista mes y año de la dieta separados por un espacio
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
        $pdf->loadHTML($view)->setOrientation('landscape'); // cambiar tamaño y orientacion del papel
        $pdf->loadHTML($view);

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
        $parametros = explode(' ', $tipo); //se reciben id asambleista mes y año de la dieta separados por un espacio
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
        $parametros = explode(' ', $tipo); //se reciben id asambleista mes y año de la dieta separados por un espacio
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
        $pdf->loadHTML($view)->setOrientation('landscape'); // cambiar tamaño y orientacion del papel
        $pdf->loadHTML($view);

        if($verdescar==1)
        {
            return $pdf->stream('reporte');
        }
        if($verdescar==2)
        {
            return $pdf->download('reporte.pdf'); 
        }
        

    }



 


      public function Reporte_consolidados_renta($tipo) 
    {
      
        $data = $this->getData();
        $date = date('Y-m-d');
        $invoice = "2222";
        $view =  \View::make('Reportes/Reporte_consolidados_renta_pdf', compact('data', 'date', 'invoice'))->render();
        $pdf = \App::make('dompdf.wrapper');      
        $pdf->loadHTML($view)->setOrientation('landscape'); // cambiar tamaño y orientacion del papel
        $pdf->loadHTML($view);

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
    
    
    
      public function Reporte_consolidados_renta_docente($tipo) 
    {
      
        $data = $this->getData();
        $date = date('Y-m-d');
        $invoice = "2222";
        $view =  \View::make('Reportes/Reporte_consolidados_renta_docente_pdf', compact('data', 'date', 'invoice'))->render();
        $pdf = \App::make('dompdf.wrapper');      
        $pdf->loadHTML($view)->setOrientation('landscape'); // cambiar tamaño y orientacion del papel
        $pdf->loadHTML($view);

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
    

       public function Reporte_constancias_renta($tipo) 
    {
      
        $data = $this->getData();
        $date = date('Y-m-d');
        $invoice = "2222";
        $view =  \View::make('Reportes/Reporte_permisos_permanentes_pdf', compact('data', 'date', 'invoice'))->render();
        $pdf = \App::make('dompdf.wrapper');      
        //$pdf->loadHTML($view)->setPaper('a4')->setOrientation('landscape'); // cambiar tamaño y orientacion del papel
        $pdf->loadHTML($view);

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
        $view =  \View::make('Reportes/Reporte_permisos_permanentes_pdf', compact('data', 'date', 'invoice'))->render();
        $pdf = \App::make('dompdf.wrapper');      
        //$pdf->loadHTML($view)->setPaper('a4')->setOrientation('landscape'); // cambiar tamaño y orientacion del papel
        $pdf->loadHTML($view);

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
        $pdf->loadHTML($view);

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
