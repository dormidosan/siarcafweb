@extends('layouts.Modal')
@section("styles")
    <link rel="stylesheet" href="{{ asset('libs/adminLTE/plugins/icheck/skins/square/green.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/lolibox/css/Lobibox.min.css') }}">
@endsection

@section("idModal","mostrarIntervencion")
@section("EncabezadoModal","Encabezado intervencion")
@section("size","modal-lg")

@section("bodyModal")

  
        <div class="panel panel-success">
            <!-- Default panel contents -->
            <div class="panel-heading">Contenido intervencion</div>
            <div class="box-body table-responsive">
            

            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-center">
            <h4>Agenda {{$agenda->codigo}}</h4>
        </div>

@endsection

@section("footerModal")

@endsection



