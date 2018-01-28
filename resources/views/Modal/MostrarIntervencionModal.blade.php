@extends('layouts.Modal')
@section("styles")
    <link rel="stylesheet" href="{{ asset('libs/adminLTE/plugins/icheck/skins/square/green.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/lolibox/css/Lobibox.min.css') }}">
@endsection

@section("idModal","mostrarIntervencion")
@section("EncabezadoModal","Encabezado intervencion")
@section("size","modal-lg")

@section("bodyModal")
    <form id="datos_intervencion">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label>Nombre de Asambleista</label>
                    <input type="text" id="asambleista_nombre" class="form-control" value="" readonly>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label>Contenido de la Intervencion</label>
                    <textarea id="contenido" class="form-control" readonly></textarea>
                </div>
            </div>
        </div>
    </form>
@endsection

@section("footerModal")
    <div class="modal-footer text-center">
        <div class="row">
            <div class="col-lg-12">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
@endsection



