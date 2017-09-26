<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Style;


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



$wrappingStyles = array('inline', 'behind', 'infront', 'square', 'tight');

$header->addText('UNIVERSIDAD DE EL SALVADOR','r2Style', 'p2Style');
$header->addText('ASAMBLEA GENERAL UNIVERSITARIA','r2Style', 'p2Style');



$footer = $section->createFooter();
$footer->addPreserveText('Page {PAGE} of {NUMPAGES}.', array('align'=>'right'));



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

















$objWriter =  \PhpOffice\PhpWord\IOFactory::createWriter($PHPWord, 'Word2007');
$objWriter->save('helloWorld.docx');

return response()->download('C:\xampp\htdocs\siarcaf\public\helloWorld.docx');


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
}
