<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function invoice($tipo) 
    {
      
        $data = $this->getData();
        $date = date('Y-m-d');
        $invoice = "2222";
        $view =  \View::make('Reportes/invoice', compact('data', 'date', 'invoice'))->render();
        $pdf = \App::make('dompdf.wrapper');      
        //$pdf->loadHTML($view)->setPaper('a4')->setOrientation('landscape'); // cambiar tamaño y orientacion del papel
        $pdf->loadHTML($view);

        if($tipo==1){return $pdf->stream('reporte');}
        if($tipo==2){return $pdf->download('reporte.pdf'); }

        //return $pdf->stream('invoice.pdf'); //mostrar pdf en pagina
        //return $pdf->download('invoice.pdf'); // descargar el archivo pdf
    }
    
   // public function listado(){
   // return view("Reportes.listado_reportes");
  //  }


    public function getData() 
    {
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
}
