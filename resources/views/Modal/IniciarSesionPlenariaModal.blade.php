@extends('layouts.Modal')
@section("styles")
    <link rel="stylesheet" href="{{ asset('libs/adminLTE/plugins/icheck/skins/square/green.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/lolibox/css/Lobibox.min.css') }}">
@endsection

@section("idModal","iniciarSesionPlenaria")
@section("EncabezadoModal","Sesiones Activas")
@section("size","modal-lg")

@section("bodyModal")

    <form id="sesion_activa" name="sesion_activa" method="" action="" enctype="multipart/form-data">

        <div class="panel panel-success">
            <!-- Default panel contents -->
            <div class="panel-heading">Sesiones</div>
            <div class="box-body table-responsive">
                        <table id="sesionesPlenarias"
                               class="table table-striped table-bordered table-condensed table-hover dataTable text-center">
                            <thead class="text-bold">
                            <tr>
                                <th>No.</th>
                                <th>Sesión Plenaria</th>
                                <th>Descripción</th>
                                <th>Fecha de inicio</th>
                                <th>Fecha Ultimo Acceso</th>
                                <th>Opción</th>
                            </tr>
                            </thead>

                            <!--Valores quemados para efectos de presentación -->
                            <tbody id="cuerpoTabla">
                                <tr>
                                    <td>1</td>
                                    <td> 06 AGU 2017-2019 </td>
                                    <td>Proceso de elección de autoridades</td>
                                    <td> 26/10/2017</td>
                                    <td> 26/10/2017</td>
                                    <td><button type="button" class="btn btn-success">Comenzar</button></td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td> 07 AGU 2017-2019 </td>
                                    <td>Agenda de recursos de nulidad</td>
                                    <td> 26/11/2017</td>
                                    <td> 26/10/2017</td>
                                    <td><button type="button" class="btn btn-success">Comenzar</button></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
        <!-- /.box-body -->
        <div class="box-footer text-center">
            <h4>Período 2017-2017</h4>
        </div>
    </form>
@endsection

@section("footerModal")

@endsection


