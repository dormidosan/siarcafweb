@extends('layouts.app')

@section("styles")
    <link rel="stylesheet" href="{{ asset('libs/adminLTE/plugins/icheck/skins/square/green.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/adminLTE/plugins/toogle/css/bootstrap-toggle.min.css') }}">
@endsection

@section('content')
    <div class="box box-solid box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Facultad de Ciencias Agronómicas</h3>
        </div>

        <div class="box-body">
            <div class="panel panel-success">
                <!-- Default panel contents -->
                <div class="panel-heading">Control de Permisos y Asisntencia</div>

                <div class="table-responsive">
                    <table id="listadoAsambleista" class="table text-center">
                        <thead>
                        <tr>
                            <th>Asambleista</th>
                            <th>Cargo</th>
                            <th>Sector</th>
                            <th>Hora de entrada</th>
                            <th>Presente</th>
                            <th>Propietaria</th>
                            <th>Permiso Temporal</th>
                            <th>Observación/Motivo</th>
                        </tr>
                        </thead>
                        <tbody id="cuerpoTabla" class="text-center">
                        <tr>
                            <td>Wendy Carolina Criollo Hernández</td>
                            <td>Propietaria</td>
                            <td>Estudiantil</td>
                            <td>9:52:00 am</td>
                            <td></td>
                            <td></td>
                            <td>
                                <ul class="fa-ul">
                                    <li><i class="fa-li fa fa-check-square fa-lg s"></i></li>
                                </ul>
                            </td>
                            <td></td>
                        </tr>
                        </tbody>

                    </table>

                </div>

            </div>
        </div>

    </div>
    </div>
@endsection

@section("js")
@endsection
@section("script")
@endsection