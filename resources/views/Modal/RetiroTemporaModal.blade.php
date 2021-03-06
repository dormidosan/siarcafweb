@extends('layouts.Modal')

@section("idModal","retiroTemporal")
@section("EncabezadoModal","Retiro Temporal")
@section("size","modal-sm")

@section("bodyModal")
    <p class="text-center">¿Desea retirar temporalmente al asambleista: <span id="nombre_asambleista" class="text-bold"></span>?</p>
    <form id="retiro_temporal" name="retiro_temporal" action="{{route("retiro_temporal")}}" method="post">
        {{ csrf_field() }}
        <div class="row hidden" >
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Agenda</label>
                    <input type="text" id="agenda" name="agenda">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Asambleisa</label>
                    <input type="text" id="asambleista" name="asambleista">
                </div>
            </div>
        </div>
        <div class="row hidden">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Tipo Retiro</label>
                    <input type="text"  id="tipo" name="tipo" value="1">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Facultad</label>
                    <input type="text"  id="facultad_modal" name="facultad_modal">
                </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-lg-6 col-lg-push-1">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
            <div class="col-lg-6 col-lg-pull-1">
                <button type="submit" class="btn btn-primary">Aceptar</button>
            </div>
        </div>
    </form>
@endsection

@section("footerModal")
@endsection


