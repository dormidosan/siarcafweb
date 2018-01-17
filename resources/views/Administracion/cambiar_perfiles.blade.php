@extends('layouts.app')

@section('breadcrumb')
    <section>
        <ol class="breadcrumb">
            <li><a href="{{ route("inicio") }}"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a>Administracion</a></li>
            <li><a>Gestionar Usuarios</a></li>
            <li><a href="{{ route("administracion_usuario") }}">Administracion Usuarios</a></li>
            <li><a class="active">Perfiles</a></li>
        </ol>
    </section>
@endsection

@section("content")
    <div class="box box-danger">
        <div class="box-header">
            <h3 class="box-title">Cambiar Perfiles</h3>
        </div>
        <div class="box-body">
            <table class="table text-center">
                <thead>
                <tr>
                    <th>Asambleista</th>
                    <th>Perfil Anterior</th>
                    <th>Nuevo Perfil</th>
                </tr>
                </thead>
                <tbody>
                @foreach($asambleistas as $asambleista)
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection


@section("scripts")
    <script type="text/javascript">
        $(function () {
        });
    </script>
@endsection