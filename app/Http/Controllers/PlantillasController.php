<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Style;
use Illuminate\Support\Facades\DB;


class PlantillasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function Plantilla_actas($tipo) 
    {
        $periodo='2015-2017'; //leido de la base
      
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
array('width'=>100, 'height'=>100, 'align'=>'Left','marginTop' => -1,
'wrappingStyle'=>'square',
       'positioning' => 'absolute',     
       'posVerticalRel' => 'line'));//margen izquierdo


$header->addImage('C:\xampp\htdocs\siarcaf\public\images\agu_web.jpg', 
array('width' => 150,
'height' => 150,
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







$textrun = $section->addTextRun('arial12');
$textrun->addText('El Infrascrito Secretario de la Junta Directiva de la Asamblea General 
Universitaria, de la Universidad de El Salvador (2015-2017) ', //periodo tiene que ser leido de la base
array('name'=>'Arial', 'size'=>10, 'bold'=>true,'spaceBefore' => 0, 'spaceAfter' => 0, 'spacing' => 0));
$textrun->addText('certifica:');

$textrun1 = $section->addTextRun('arial12');
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

$textrun2 = $section->addTextRun('arial12');
$textrun2->addText('"PUNTO V: ');
$textrun2->addText('TOMA DE ACUERDOS: ACUERDO NÚMERO CATORCE: ', //leido de la base 
array('name'=>'Arial', 'size'=>10, 'bold'=>true,'spaceBefore' => 0, 'spaceAfter' => 0, 'spacing' => 0));
$textrun2->addText('La junta Directiva considerando el acuerdo No. 083/JD-AGU/2015-2017 (v.2) de fecha trece de marzo del dos mil diecisiete, 
y con base en el Articulo 20 literales b) y k) del Reglamento Interno de Asamblea General Universitaria de la Universidad de el Salvador, 
por tres votos a favor (unanimidad) ');
$textrun2->addText('ACUERDA: ', //leido de la base 
array('name'=>'Arial', 'size'=>10, 'bold'=>true,'spaceBefore' => 0, 'spaceAfter' => 0, 'spacing' => 0));



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


$section->addListItem('Dar por recibida la nota presentada el seis de junio de dos mil diecisiete, por la Br. Wendy Carolina Criollo Hernández, 
en la que solicita copia simple de formatos utilizados en el desempeño de sus actividades diarias por el personal
administrativo de la Asamblea General Universitaria (según lo detalla), lo cual será utilizado en el desarrollo del proyecto denominado:
Sistema Informático para el Apoyo de Reuniones y Control de Acuerdos de la Asamblea General Universitaria de la Universidad de El Salvador,
SIARCA_AGU_UES.', 0, null, 'multilevel',array('align'=>'both'));

$section->addListItem('Remitir a la Br. Criollo Hernández, copias simples de los siguientes formatos solicitados.', 0, null, 'multilevel');





for ($i = 1; $i <= 14; $i++) {

    $section->addListItem('formato de ...', 1, null, 'multilevel');
    
}


$section->addText('Y para su conocimiento y efectos legales consiguientes, transcribo el presente Acuerdo en la 
    Ciudad Universitaria, San Salvador, a los dieciséis dias del mes de junio de dos mil diecisiete.');


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




$objWriter =  \PhpOffice\PhpWord\IOFactory::createWriter($PHPWord, 'Word2007'); 
$objWriter->save('Actas.docx'); // guarda los archivo en la carpeta public del proyecto

return response()->download('C:\xampp\htdocs\siarcaf\public\Actas.docx');


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
