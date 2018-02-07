<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Style;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Requests\ActasRequest;
class PlantillasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


 public function buscar_actas(ActasRequest $request){
        $fechainicial=$request->fecha1;
        $fechafinal=$request->fecha2;   

        $date1 = Date($fechainicial);
        $date2 = Date($fechafinal);

        if($date1>$date2){
        $request->session()->flash("warning", "Fecha inicial no puede ser mayor a la fecha final");
        return view("Plantillas.Plantilla_actas")
        ->with('resultados',NULL);
        }



        $resultados=DB::table('agendas')
     
        ->where('agendas.vigente','=',0)//0 por ser agenda vigente
        ->where
([
  ['agendas.fecha','>=',$this->convertirfecha($fechainicial)],
  ['agendas.fecha','<=',$this->convertirfecha($fechafinal)]
])->get();

       // dd($resultados);

if($resultados==NULL){

 $request->session()->flash("warning", "No se encontraron registros");

}
else{
 $request->session()->flash("success", "Busqueda terminada con exito");
}

        return view("Plantillas.Plantilla_actas")
         ->with('resultados',$resultados);
      
    }



 public function buscar_acuerdos(ActasRequest $request){
        $fechainicial=$request->fecha1;
        $fechafinal=$request->fecha2;   


        $date1 = Date($fechainicial);
        $date2 = Date($fechafinal);

        if($date1>$date2){
        $request->session()->flash("warning", "Fecha inicial no puede ser mayor a la fecha final");
        return view("Plantillas.Plantilla_acuerdos")
        ->with('resultados',NULL);
        }

        $resultados=DB::table('agendas')
        ->where('agendas.vigente','=',0)//0 por ser agenda vigente
        ->where
([
  ['agendas.fecha','>=',$this->convertirfecha($fechainicial)],
  ['agendas.fecha','<=',$this->convertirfecha($fechafinal)]
])->get();

       // dd($resultados);

if($resultados==NULL){

 $request->session()->flash("warning", "No se encontraron registros");

}
else{
 $request->session()->flash("success", "Busqueda terminada con exito");
}

        return view("Plantillas.Plantilla_acuerdos")
         ->with('resultados',$resultados);


    }


public function buscar_dictamenes(ActasRequest $request){
        $fechainicial=$request->fecha1;
        $fechafinal=$request->fecha2;   

        $date1 = Date($fechainicial);
        $date2 = Date($fechafinal);

        if($date1>$date2){
        $request->session()->flash("warning", "Fecha inicial no puede ser mayor a la fecha final");
        return view("Plantillas.Plantilla_acuerdos")
        ->with('resultados',NULL);
        }

        $resultados=DB::table('agendas')
     
        ->where('agendas.vigente','=',0)//0 por ser agenda vigente
        ->where
([
  ['agendas.fecha','>=',$this->convertirfecha($fechainicial)],
  ['agendas.fecha','<=',$this->convertirfecha($fechafinal)]
])->get();

       // dd($resultados);

if($resultados==NULL){

 $request->session()->flash("warning", "No se encontraron registros");

}
else{
 $request->session()->flash("success", "Busqueda terminada con exito");
}

        return view("Plantillas.Plantilla_dictamenes")
         ->with('resultados',$resultados);


    }


     public function buscar_actas_JD(ActasRequest $request){
        $fechainicial=$request->fecha1;
        $fechafinal=$request->fecha2;   
        $resultados=DB::table('reuniones')
     
        ->where('reuniones.vigente','=',0)//0 por ser agenda vigente
        ->where
([
  ['reuniones.inicio','>=',$this->convertirfecha($fechainicial)],
  ['reuniones.inicio','<=',$this->convertirfecha($fechafinal)]
])->get();

       // dd($resultados);
        return view("Plantillas.Plantilla_actas_JD")
         ->with('resultados',$resultados);
      return view("Plantillas.Plantilla_Actas_JD",['resultados'=>NULL]);
    }



public function buscarFacultad($idFacultad){

$nombrefacultad='NO ASIGNADO';
$facultades=DB::table('facultades')        
        ->get();

foreach ($facultades as $facultad) {
    if($facultad->id==$idFacultad){
        $nombrefacultad=$facultad->nombre;
    }
}

return $nombrefacultad;

}


    public function desc_Plantilla_actas($tipo) //https://stackoverflow.com/questions/46202824/how-to-fix-warning-illegal-string-offset-in-laravel-5-4
    {
        
        $parametros = explode('.', $tipo);
        $id_agenda=$parametros[0];
        $id_periodo=$parametros[1];
        $codigo_agenda=$parametros[2];
        $fecha_agenda=$parametros[3];
        $lugar_agenda=$parametros[4];
        
        $periodos=DB::table('periodos')
        ->where('periodos.id','=', $id_periodo)
        ->first();

        $periodo_nombre=$periodos->nombre_periodo; //leido de la base
      

       
$PHPWord = new PHPWord();

// Every element you want to append to the word document is placed in a section.
// To create a basic section:
$section = $PHPWord->createSection();

// After creating a section, you can append elements:

$PHPWord->addFontStyle('r2Style', array('bold'=>false, 'italic'=>false, 'size'=>12));
$PHPWord->addParagraphStyle('p2Style', array('align'=>'center'));
$PHPWord->addParagraphStyle('arial12', array('name'=>'Arial', 'size'=>10,'align'=>'both'));

//$PHPWord->addParagraphStyle('p2Style', array('align'=>'center', 'spaceAfter'=>100));

$header = $section->createHeader();
$textrun = $section->addTextRun('p2Style');

//$table = $header->addTable();
//$table->addRow();
//$table->addCell(4500)->addText('This is the header.','r2Style', 'p2Style');
//$table->addCell(4500)->addText('This is the header.','r2Style', 'p2Style');
//$table->addCell(4500)->addImage('_earth.jpg', array('width'=>50, 'height'=>50, 'align'=>'right'));
// Add footer

/*$header->addImage('C:\xampp\htdocs\siarcaf\public\images\Logo_UES.jpg', 
array('width'=>100, 'height'=>100, 'align'=>'Left','marginTop' => -1,
'wrappingStyle'=>'square',
       'positioning' => 'absolute',
       'posHorizontalRel' => 'margin',
       'posVerticalRel' => 'line'));*///margen izquierdo


$header->addImage('C:\xampp\htdocs\siarcaf\public\images\Logo_UES.jpg', 
array('width'=>75, 'height'=>75, 'align'=>'Left','marginTop' => -1,
'wrappingStyle'=>'square',
       'positioning' => 'absolute',     
       'posVerticalRel' => 'line'));//margen izquierdo


$header->addImage('C:\xampp\htdocs\siarcaf\public\images\agu_web.jpg', 
array('width' => 120,
'height' => 120,
'align'=>'right',
'wrappingStyle' => 'square',
'positioning' => 'relative',
'marginTop' => 0

       ));  //margen derecho



/*'width'=>150, 'height'=>150, 'align'=>'right','marginTop' => 0,
'wrappingStyle'=>'inline',
       'positioning' => 'relative'*/
/*
$imageStyle = array(
    'width' => 40,
    'height' => 40
    'wrappingStyle' => 'square',
    'positioning' => 'absolute',
    'posHorizontalRel' => 'margin',
    'posVerticalRel' => 'line',
);
$textrun->addImage('resources/_earth.jpg', $imageStyle);
*/

$wrappingStyles = array('inline', 'behind', 'infront', 'square', 'tight');

$header->addText('UNIVERSIDAD DE EL SALVADOR','r2Style', 'p2Style');

$header->addText('ASAMBLEA GENERAL UNIVERSITARIA','r2Style', 'p2Style');

$header->addText('ACTA No.##/'.$periodo_nombre.' SESION PLENARIA ORDINARIA','r2Style', 'p2Style');




         $Asambleistas=DB::table('asistencias')
        ->join('asambleistas','asistencias.asambleista_id','=','asambleistas.id')
        ->join('users','asambleistas.user_id','=','users.id')
        ->join('personas','users.persona_id','=','personas.id')
        ->where('asistencias.agenda_id','=',$id_agenda)//por el momento solo filtro por el id
        ->select('personas.primer_apellido','personas.primer_nombre','personas.segundo_apellido',
                 'personas.segundo_nombre','asistencias.entrada','asistencias.salida','asistencias.propietaria','asambleistas.facultad_id')
        ->orderBy('asambleistas.facultad_id', 'asc')

        ->get();


$textrun = $section->addTextRun('arial12');

$textrun->addText('Realizado en '.$lugar_agenda.' de la Universidad de El Salvador realizado el '.$fecha_agenda.
    ' reunidos los siguientes Asambleistas:', 
array('name'=>'Arial', 'size'=>10, 'bold'=>true,'spaceBefore' => 0, 'spaceAfter' => 0, 'spacing' => 0));



$textrun1 = $section->addTextRun('p2Style');

$facultad='';

foreach ($Asambleistas as $Asambleista) {
     if(!($facultad==$this->buscarFacultad($Asambleista->facultad_id)))
     {
$textrun1->addText('<w:br/>'.$this->buscarFacultad($Asambleista->facultad_id).'<w:br/>'.'<w:br/>');
$facultad=$this->buscarFacultad($Asambleista->facultad_id);
     }
$textrun1->addText($Asambleista->primer_nombre.' '.$Asambleista->segundo_nombre.' '.$Asambleista->primer_apellido.' '.$Asambleista->segundo_apellido.'<w:br/>');
}


/*
$textrun1->addText('Que en Acta de Sesión Ordinaria de Junta Directiva de la Asamblea General Universitaria ');
$textrun1->addText('NÚMERO 096/JD-AGU/2015-2017 (V.14), ', //leido de la base 
array('name'=>'Arial', 'size'=>10, 'bold'=>true,'spaceBefore' => 0, 'spaceAfter' => 0, 'spacing' => 0));
$textrun1->addText('celebrada el día lunes doce de junio de dos mil diecisiete, se encuentra el PUNTO V: '); //leido de la base
$textrun1->addText('TOMA DE ACUERDOS ', //leido de la base 
array('name'=>'Arial', 'size'=>10, 'bold'=>true,'spaceBefore' => 0, 'spaceAfter' => 0, 'spacing' => 0));
$textrun1->addText('en el que consta el '); 
$textrun1->addText('ACUERDO NUMERO CATORCE ', //leido de la base 
array('name'=>'Arial', 'size'=>10, 'bold'=>true,'spaceBefore' => 0, 'spaceAfter' => 0, 'spacing' => 0));
$textrun1->addText('que literalmente dice: '); 
*/

$textrun2 = $section->addTextRun('arial12');
$textrun2->addText('Para tratar la siguiente agenda propuesta por la junta directiva de este Organismo: <w:br/>');


/*
$textrun2->addText('"PUNTO V: ');
$textrun2->addText('TOMA DE ACUERDOS: ACUERDO NÚMERO CATORCE: ', //leido de la base 
array('name'=>'Arial', 'size'=>10, 'bold'=>true,'spaceBefore' => 0, 'spaceAfter' => 0, 'spacing' => 0));
$textrun2->addText('La junta Directiva considerando el acuerdo No. 083/JD-AGU/2015-2017 (v.2) de fecha trece de marzo del dos mil diecisiete, 
y con base en el Articulo 20 literales b) y k) del Reglamento Interno de Asamblea General Universitaria de la Universidad de el Salvador, 
por tres votos a favor (unanimidad) ');
$textrun2->addText('ACUERDA: ', //leido de la base 
array('name'=>'Arial', 'size'=>10, 'bold'=>true,'spaceBefore' => 0, 'spaceAfter' => 0, 'spacing' => 0));*/



$PHPWord->addNumberingStyle(
    'multilevel',
    array(
        'type' => 'multilevel',
        'levels' => array(
            array('format' => 'upperLetter', 'text' => '%1.', 'left' => 360, 'hanging' => 360, 'tabPos' => 360),
            array('format' => 'decimal', 'text' => '%2.', 'left' => 720, 'hanging' => 360, 'tabPos' => 720)
        )
    )
);


$textrun3 = $section->addTextRun('arial12');


/*$section->addListItem('Dar por recibida la nota presentada el seis de junio de dos mil diecisiete, por la Br. Wendy Carolina Criollo Hernández, 
en la que solicita copia simple de formatos utilizados en el desempeño de sus actividades diarias por el personal
administrativo de la Asamblea General Universitaria (según lo detalla), lo cual será utilizado en el desarrollo del proyecto denominado:
Sistema Informático para el Apoyo de Reuniones y Control de Acuerdos de la Asamblea General Universitaria de la Universidad de El Salvador,
SIARCA_AGU_UES.', 0, null, 'multilevel',array('align'=>'both'));

$section->addListItem('Remitir a la Br. Criollo Hernández, copias simples de los siguientes formatos solicitados.', 0, null, 'multilevel');*/


//dd($id_agenda);
 $puntos=DB::table('puntos')
        ->where('puntos.agenda_id','=',$id_agenda)
        ->where('puntos.retirado','=',0)
         ->orderBy('puntos.romano','asc')
        ->get();
//dd($puntos);

foreach ($puntos as $punto) {
    $section->addListItem($punto->romano.' '.$punto->descripcion, 0, null, 'multilevel');

    $propuestas=DB::table('propuestas')
    ->where('propuestas.punto_id','=',$punto->id)
    ->get();
    foreach ($propuestas as $propuesta) {
   if($propuesta->ganadora==1){
    $section->addListItem($propuesta->nombre_propuesta.' (PROPUESTA GANADORA) '.' FAVOR: '.$propuesta->favor.' CONTRA: '.$propuesta->contra, 1, null, 'multilevel');   
    }
    else{
    $section->addListItem($propuesta->nombre_propuesta.' FAVOR: '.$propuesta->favor.' CONTRA: '.$propuesta->contra, 1, null, 'multilevel');
    }
    }
    
}


$section->addText('Y para su conocimiento y efectos legales consiguientes, transcribo el presente Acuerdo en la 
    Ciudad Universitaria, San Salvador, '.$fecha_agenda);


$section->addText('Lic. César Alfredo Arias Hernández');
$section->addText('Secretario de la Junta Directiva');
$section->addText('Asamblea General Universitaria');


$footer = $section->createFooter();
//$footer->addPreserveText('Page {PAGE} of {NUMPAGES}.', array('align'=>'right')); //Saca el numero de paginas del documento y lo agrega en el footer

$footer->addPreserveText('FINAL AVENIDA "Mártires Estudiantes del 30 de julio", Ciudad Universitaria
    Tel. Presidencia 2226-95950, Registro de Asociaciones Estudiantiles 2511-2057, Secretaria de la AGU 2225-7076,
    Unidad Financiera 2511-2022', array('align'=>'center'));

/*$section->addListItem('List Item I.a', 1, null, 'multilevel'); 
$section->addListItem('List Item I.b', 0, null, 'multilevel');*/

/*$users = DB::table('users')->get();
foreach ($users as $user) {
    $textrun3->addText($user->name);
}*/ //si sirve asi xdxdxd

//$listItemRun = $section->addListItemRun();

//$listItemRun->addText('',array('format' => 'upperLetter', 'text' => '%1.', 'left' => 360, 'hanging' => 360, 'tabPos' => 360));
//$listItemRun->addText('', array('name'=>'Arial', 'size'=>10, 'bold'=>true,'spaceBefore' => 0, 'spaceAfter' => 0, 'spacing' => 0,'format' => 'decimal', 'text' => '%2.', 'left' => 720, 'hanging' => 360, 'tabPos' => 720));

/*$listItemRun = $section->addListItemRun();
$listItemRun->addText('List item 2');
$listItemRun->addText(' in italic', array('italic' => true));
$listItemRun = $section->addListItemRun();
$listItemRun->addText('List item 3');
$listItemRun->addText(' underlined', array('underline' => 'dash'));*/



try {
      $objWriter =  \PhpOffice\PhpWord\IOFactory::createWriter($PHPWord, 'Word2007'); 
      $objWriter->save('Acta_'.$fecha_agenda.'_'. $codigo_agenda.'.docx'); // guarda los archivo en la carpeta public del proyecto

    } catch (Exception $e) {

    }

    

return response()->download('C:\xampp\htdocs\siarcaf\public\Acta_'.$fecha_agenda.'_'. $codigo_agenda.'.docx');


    }

 

    public function desc_Plantilla_acuerdos($tipo) //https://stackoverflow.com/questions/46202824/how-to-fix-warning-illegal-string-offset-in-laravel-5-4
    {
        
        $parametros = explode('.', $tipo);
        $id_agenda=$parametros[0];
        $id_periodo=$parametros[1];
        $codigo_agenda=$parametros[2];
        $fecha_agenda=$parametros[3];
        $lugar_agenda=$parametros[4];
        
        $periodos=DB::table('periodos')
        ->where('periodos.id','=', $id_periodo)
        ->first();

        $periodo_nombre=$periodos->nombre_periodo; //leido de la base
      

       
$PHPWord = new PHPWord();

$section = $PHPWord->createSection();


$PHPWord->addFontStyle('r2Style', array('bold'=>false, 'italic'=>false, 'size'=>12));
$PHPWord->addParagraphStyle('p2Style', array('align'=>'center'));
$PHPWord->addParagraphStyle('arial12', array('name'=>'Arial', 'size'=>10,'align'=>'both'));



$header = $section->createHeader();
$textrun = $section->addTextRun('p2Style');




$header->addImage('C:\xampp\htdocs\siarcaf\public\images\Logo_UES.jpg', 
array('width'=>75, 'height'=>75, 'align'=>'Left','marginTop' => -1,
'wrappingStyle'=>'square',
       'positioning' => 'absolute',     
       'posVerticalRel' => 'line'));//margen izquierdo


$header->addImage('C:\xampp\htdocs\siarcaf\public\images\agu_web.jpg', 
array('width' => 120,
'height' => 120,
'align'=>'right',
'wrappingStyle' => 'square',
'positioning' => 'relative',
'marginTop' => 0

       ));  //margen derecho



$wrappingStyles = array('inline', 'behind', 'infront', 'square', 'tight');

$header->addText('UNIVERSIDAD DE EL SALVADOR','r2Style', 'p2Style');

$header->addText('ASAMBLEA GENERAL UNIVERSITARIA','r2Style', 'p2Style');

$header->addText('ACUERDO No.##/'.$periodo_nombre.'','r2Style', 'p2Style');




         $Asambleistas=DB::table('asistencias')
        ->join('asambleistas','asistencias.asambleista_id','=','asambleistas.id')
        ->join('users','asambleistas.user_id','=','users.id')
        ->join('personas','users.persona_id','=','personas.id')
        ->where('asistencias.agenda_id','=',$id_agenda)//por el momento solo filtro por el id
        ->select('personas.primer_apellido','personas.primer_nombre','personas.segundo_apellido',
                 'personas.segundo_nombre','asistencias.entrada','asistencias.salida','asistencias.propietaria','asambleistas.facultad_id')
        ->orderBy('asambleistas.facultad_id', 'asc')

        ->get();


$textrun = $section->addTextRun('arial12');

$textrun->addText('Realizado en '.$lugar_agenda.' de la Universidad de El Salvador realizado el '.$fecha_agenda.
    ' reunidos los siguientes Asambleistas:', 
array('name'=>'Arial', 'size'=>10, 'bold'=>true,'spaceBefore' => 0, 'spaceAfter' => 0, 'spacing' => 0));



$textrun1 = $section->addTextRun('p2Style');

$facultad='';

foreach ($Asambleistas as $Asambleista) {
     if(!($facultad==$this->buscarFacultad($Asambleista->facultad_id)))
     {
$textrun1->addText('<w:br/>'.$this->buscarFacultad($Asambleista->facultad_id).'<w:br/>'.'<w:br/>');
$facultad=$this->buscarFacultad($Asambleista->facultad_id);
     }
$textrun1->addText($Asambleista->primer_nombre.' '.$Asambleista->segundo_nombre.' '.$Asambleista->primer_apellido.' '.$Asambleista->segundo_apellido.'<w:br/>');
}



$textrun2 = $section->addTextRun('arial12');
$textrun2->addText('Para tratar la siguiente agenda propuesta por la junta directiva de este Organismo: <w:br/>');




$PHPWord->addNumberingStyle(
    'multilevel',
    array(
        'type' => 'multilevel',
        'levels' => array(
            array('format' => 'upperLetter', 'text' => '%1.', 'left' => 360, 'hanging' => 360, 'tabPos' => 360),
            array('format' => 'decimal', 'text' => '%2.', 'left' => 720, 'hanging' => 360, 'tabPos' => 720)
        )
    )
);


$textrun3 = $section->addTextRun('arial12');


//dd($id_agenda);
 $puntos=DB::table('puntos')
        ->where('puntos.agenda_id','=',$id_agenda)
        ->where('puntos.retirado','=',0)
        ->orderBy('puntos.romano','asc')
        ->get();
//dd($puntos);

foreach ($puntos as $punto) {
    $section->addListItem($punto->romano.' '.$punto->descripcion, 0, null, 'multilevel');

    $propuestas=DB::table('propuestas')
    ->where('propuestas.punto_id','=',$punto->id)
    ->get();
    foreach ($propuestas as $propuesta) {
    if($propuesta->ganadora==1){
     $section->addListItem($propuesta->nombre_propuesta.' (PROPUESTA GANADORA) '.' FAVOR: '.$propuesta->favor.' CONTRA: '.$propuesta->contra, 1, null, 'multilevel');   
     }
    else{
    $section->addListItem($propuesta->nombre_propuesta.' FAVOR: '.$propuesta->favor.' CONTRA: '.$propuesta->contra, 1, null, 'multilevel');
    }

    }
    
}


$section->addText('Y para su conocimiento y efectos legales consiguientes, transcribo el presente Acuerdo en la 
    Ciudad Universitaria, San Salvador, '.$fecha_agenda);


$section->addText('Lic. César Alfredo Arias Hernández');
$section->addText('Secretario de la Junta Directiva');
$section->addText('Asamblea General Universitaria');


$footer = $section->createFooter();
//$footer->addPreserveText('Page {PAGE} of {NUMPAGES}.', array('align'=>'right')); //Saca el numero de paginas del documento y lo agrega en el footer

$footer->addPreserveText('FINAL AVENIDA "Mártires Estudiantes del 30 de julio", Ciudad Universitaria
    Tel. Presidencia 2226-95950, Registro de Asociaciones Estudiantiles 2511-2057, Secretaria de la AGU 2225-7076,
    Unidad Financiera 2511-2022', array('align'=>'center'));


try {
      $objWriter =  \PhpOffice\PhpWord\IOFactory::createWriter($PHPWord, 'Word2007'); 
      $objWriter->save('Acuerdo_'.$fecha_agenda.'_'. $codigo_agenda.'.docx'); // guarda los archivo en la carpeta public del proyecto

    } catch (Exception $e) {

    }


return response()->download('C:\xampp\htdocs\siarcaf\public\Acuerdo_'.$fecha_agenda.'_'. $codigo_agenda.'.docx');


    }









     public function desc_Plantilla_dictamenes($tipo) //https://stackoverflow.com/questions/46202824/how-to-fix-warning-illegal-string-offset-in-laravel-5-4
    {
        
        $parametros = explode('.', $tipo);
        $id_agenda=$parametros[0];
        $id_periodo=$parametros[1];
        $codigo_agenda=$parametros[2];
        $fecha_agenda=$parametros[3];
        $lugar_agenda=$parametros[4];
        
        $periodos=DB::table('periodos')
        ->where('periodos.id','=', $id_periodo)
        ->first();

        $periodo_nombre=$periodos->nombre_periodo; //leido de la base
      

       
$PHPWord = new PHPWord();

$section = $PHPWord->createSection();


$PHPWord->addFontStyle('r2Style', array('bold'=>false, 'italic'=>false, 'size'=>12));
$PHPWord->addParagraphStyle('p2Style', array('align'=>'center'));
$PHPWord->addParagraphStyle('arial12', array('name'=>'Arial', 'size'=>10,'align'=>'both'));



$header = $section->createHeader();
$textrun = $section->addTextRun('p2Style');




$header->addImage('C:\xampp\htdocs\siarcaf\public\images\Logo_UES.jpg', 
array('width'=>75, 'height'=>75, 'align'=>'Left','marginTop' => -1,
'wrappingStyle'=>'square',
       'positioning' => 'absolute',     
       'posVerticalRel' => 'line'));//margen izquierdo


$header->addImage('C:\xampp\htdocs\siarcaf\public\images\agu_web.jpg', 
array('width' => 120,
'height' => 120,
'align'=>'right',
'wrappingStyle' => 'square',
'positioning' => 'relative',
'marginTop' => 0

       ));  //margen derecho



$wrappingStyles = array('inline', 'behind', 'infront', 'square', 'tight');

$header->addText('UNIVERSIDAD DE EL SALVADOR','r2Style', 'p2Style');

$header->addText('ASAMBLEA GENERAL UNIVERSITARIA','r2Style', 'p2Style');

$header->addText('DICTAMEN No.##/'.$periodo_nombre.'','r2Style', 'p2Style');




         $Asambleistas=DB::table('asistencias')
        ->join('asambleistas','asistencias.asambleista_id','=','asambleistas.id')
        ->join('users','asambleistas.user_id','=','users.id')
        ->join('personas','users.persona_id','=','personas.id')
        ->where('asistencias.agenda_id','=',$id_agenda)//por el momento solo filtro por el id
        ->select('personas.primer_apellido','personas.primer_nombre','personas.segundo_apellido',
                 'personas.segundo_nombre','asistencias.entrada','asistencias.salida','asistencias.propietaria','asambleistas.facultad_id')
        ->orderBy('asambleistas.facultad_id', 'asc')

        ->get();


$textrun = $section->addTextRun('arial12');

$textrun->addText('Realizado en '.$lugar_agenda.' de la Universidad de El Salvador realizado el '.$fecha_agenda.
    ' reunidos los siguientes Asambleistas:', 
array('name'=>'Arial', 'size'=>10, 'bold'=>true,'spaceBefore' => 0, 'spaceAfter' => 0, 'spacing' => 0));



$textrun1 = $section->addTextRun('p2Style');

$facultad='';

foreach ($Asambleistas as $Asambleista) {
     if(!($facultad==$this->buscarFacultad($Asambleista->facultad_id)))
     {
$textrun1->addText('<w:br/>'.$this->buscarFacultad($Asambleista->facultad_id).'<w:br/>'.'<w:br/>');
$facultad=$this->buscarFacultad($Asambleista->facultad_id);
     }
$textrun1->addText($Asambleista->primer_nombre.' '.$Asambleista->segundo_nombre.' '.$Asambleista->primer_apellido.' '.$Asambleista->segundo_apellido.'<w:br/>');
}



$textrun2 = $section->addTextRun('arial12');
$textrun2->addText('Para tratar la siguiente agenda propuesta por la junta directiva de este Organismo: <w:br/>');




$PHPWord->addNumberingStyle(
    'multilevel',
    array(
        'type' => 'multilevel',
        'levels' => array(
            array('format' => 'upperLetter', 'text' => '%1.', 'left' => 360, 'hanging' => 360, 'tabPos' => 360),
            array('format' => 'decimal', 'text' => '%2.', 'left' => 720, 'hanging' => 360, 'tabPos' => 720)
        )
    )
);


$textrun3 = $section->addTextRun('arial12');


//dd($id_agenda);
 $puntos=DB::table('puntos')
        ->where('puntos.agenda_id','=',$id_agenda)
        ->where('puntos.retirado','=',0)
         ->orderBy('puntos.romano','asc')
        ->get();
//dd($puntos);

foreach ($puntos as $punto) {
    $section->addListItem($punto->romano.' '.$punto->descripcion, 0, null, 'multilevel');

    $propuestas=DB::table('propuestas')
    ->where('propuestas.punto_id','=',$punto->id)
    ->get();
    foreach ($propuestas as $propuesta) {
    $section->addListItem($propuesta->nombre_propuesta, 1, null, 'multilevel');

    }
    
}


$section->addText('Y para su conocimiento y efectos legales consiguientes, transcribo el presente Acuerdo en la 
    Ciudad Universitaria, San Salvador, '.$fecha_agenda);


$section->addText('Lic. César Alfredo Arias Hernández');
$section->addText('Secretario de la Junta Directiva');
$section->addText('Asamblea General Universitaria');


$footer = $section->createFooter();
//$footer->addPreserveText('Page {PAGE} of {NUMPAGES}.', array('align'=>'right')); //Saca el numero de paginas del documento y lo agrega en el footer

$footer->addPreserveText('FINAL AVENIDA "Mártires Estudiantes del 30 de julio", Ciudad Universitaria
    Tel. Presidencia 2226-95950, Registro de Asociaciones Estudiantiles 2511-2057, Secretaria de la AGU 2225-7076,
    Unidad Financiera 2511-2022', array('align'=>'center'));




try {
      $objWriter =  \PhpOffice\PhpWord\IOFactory::createWriter($PHPWord, 'Word2007'); 
      $objWriter->save('Dictamen_'.$fecha_agenda.'_'. $codigo_agenda.'.docx'); // guarda los archivo en la carpeta public del proyecto

    } catch (Exception $e) {

    }


return response()->download('C:\xampp\htdocs\siarcaf\public\Dictamen_'.$fecha_agenda.'_'. $codigo_agenda.'.docx');


    }


     public function convertirfecha($fecha){

$fecha1conver= explode('/', $fecha);
$fechatrans=$fecha1conver[2].'-'.$fecha1conver[1].'-'.$fecha1conver[0];
$fechainicial = date('Y-m-d', strtotime($fechatrans));

        return $fechainicial;
    }

    public function index()
    {

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
}
