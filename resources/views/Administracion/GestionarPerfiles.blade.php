@extends('layouts.app')

@section("styles")
    <link rel="stylesheet" href="{{ asset('libs/adminLTE/plugins/icheck/skins/square/green.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/adminLTE/plugins/toogle/css/bootstrap-toggle.min.css') }}">
@endsection

@section('breadcrumb')
    <section>
        <ol class="breadcrumb">
            <li><a href="{{ route("inicio") }}"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a>Administracion</a></li>
            <li><a>Gestionar Usuarios</a></li>
            <li><a class="active">Gestionar Perfiles</a></li>
        </ol>
    </section>
@endsection

@section("content")
    <div class="box box-danger">
        <div class="box-header">
            <h3 class="box-title">Gestionar Perfiles</h3>
        </div>
        <div class="box-body">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Agregar Perfil</h3>
                </div>
                <div class="panel-body">
                    <form id="agregar_perfil" name="agregar_perfil" class="form-inline" method="post" action="">
                        <div class="form-group">
                            <label for="perfil">Nuevo perfil</label>
                            <input class="form-control" id="perfil" placeholder="Ingrese nuevo perfil">
                        </div>
                        <button type="submit" class="btn btn-success">Agregar</button>

                    </form>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Perfiles del Sistema</h3>
                </div>
                <div class="panel-body">
                    <table class="table text-center">
                        <thead>
                        <tr>
                            <th>Perfil</th>
                            <th>Ver</th>
                            <th>Subir</th>
                            <th>Actualizar</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Asambleista</td>
                            <td><input type="checkbox" class="cajetin" checked></td>
                            <td><input type="checkbox" class="cajetin" checked></td>
                            <td><input type="checkbox" class="cajetin"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

@endsection


@section("js")
    <!-- iCheck -->
    <script src="{{ asset('libs/adminLTE/plugins/icheck/icheck.min.js') }}"></script>
    <script src="{{ asset('libs/adminLTE/plugins/toogle/js/bootstrap-toggle.min.js') }}"></script>
@endsection

@section("scripts")
    <script type="text/javascript">

        $(function () {
            $('.cajetin').iCheck({
                checkboxClass: 'icheckbox_square-green',
                increaseArea: '20%', // optional,
            });

            $('.toogle').bootstrapToggle({
                on: 'Activa',
                off: 'Inactiva'
            });
        });

    </script>
@endsection