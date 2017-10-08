@extends('layouts.Modal')

@section("idModal","actualizarPlantilla")
@section("EncabezadoModal","Actualizar Plantilla")
@section("size","modal-lg")

@section("bodyModal")

<form id="actualizar_plantilla" name="actualizar_plantilla" method="post" action="" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="row hidden">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="plantilla">Nombre</label>
                <input type="text" id="plantilla_id" name="id" value="">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="plantilla">Seleccione nueva plantilla</label>
                <div class="file-loading">
                    <input id="plantilla" name="plantilla" type="file" accept="application/pdf">
                </div>
            </div>
        </div>
    </div>

    <!-- /.box-body -->
    <div class="box-footer text-center">
        <div class="row">
            <div class="col-lg-12">
                <button type="submit" class="btn btn-success">Actualizar Plantilla</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</form>
@endsection

@section("footerModal")

@endsection


