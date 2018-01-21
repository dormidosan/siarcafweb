@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset("libs/pretty-checkbox/pretty-checkbox.min.css") }}">
    <link href="{{ asset("libs/MaterialDesign/css/materialdesignicons.css") }}" media="all" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="{{ asset('libs/lolibox/css/Lobibox.min.css') }}">

    <!-- Datatables-->
    <link rel="stylesheet" href="{{ asset('libs/adminLTE/plugins/datatables/dataTables.bootstrap.css') }}">
    <link rel="stylesheet"
          href="{{ asset('libs/adminLTE/plugins/datatables/responsive/css/responsive.bootstrap.min.css') }}">

    <style>
        .dataTables_wrapper.form-inline.dt-bootstrap.no-footer > .row {
            margin-right: 0;
            margin-left: 0;
        }

        table.dataTable thead > tr > th {
            padding-right: 0 !important;
        }

    </style>
@endsection

@section('breadcrumb')
    <section>
        <ol class="breadcrumb">
            <li><a href="{{ route("inicio") }}"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a>Administracion</a></li>
            <li><a href="{{ route("gestionar_perfiles") }}">Gestionar Perfiles</a></li>
            <li><a class="active">Acceso a Modulos</a></li>
        </ol>
    </section>
@endsection

@section("content")
    <div class="box box-danger">
        <div class="box-header">
            <div class="box-header">
                <h3 class="box-title">Acceso a Modulos</h3>
            </div>
            <div class="box-body">
                <td class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="text-center">Nombre del Modulo</th>
                            <th class="text-center">Opciones Validas</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $searchedRole @endphp
                        <form class="row" method="post" action="{{ route("asignar_acceso_modulos") }}">
                            {{ csrf_field() }}
                            <input type="text" id="id_rol" name="id_rol" hidden value="{{ $id_rol }}">
                            @foreach($modulos_padres as $modulos_padre)
                                <tr>
                                    <td class="text-center text-bold">{{$modulos_padre->nombre_modulo}}</td>
                                    <td class="col-lg-6">
                                        @foreach($modulos_hijos as $modulos_hijo)
                                            @if($modulos_hijo->modulo_padre == $modulos_padre->id)
                                                <div>
                                                    @php $searchedRole = array_search($id_rol->nombre_rol,$modulos_hijo->roles->pluck('nombre_rol')->toArray()); @endphp

                                                    @if($modulos_hijo->roles[$searchedRole]->id == $id_rol->id)
                                                        <div class="pretty p-icon p-smooth">
                                                            <input type="checkbox" name="modulos[]"
                                                                   value="{{ $modulos_hijo->id }}" checked/>
                                                            <div class="state p-success">
                                                                <i class="icon mdi mdi-check"></i>
                                                                <label>{{$modulos_hijo->nombre_modulo}}</label>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="pretty p-icon p-smooth">
                                                            <input type="checkbox" name="modulos[]"
                                                                   value="{{ $modulos_hijo->id }}"/>
                                                            <div class="state p-success">
                                                                <i class="icon mdi mdi-check"></i>
                                                                <label>{{$modulos_hijo->nombre_modulo}}</label>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            @endif
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                            <tr class="text-center">
                                <td colspan="2">
                                    <button type="submit" class="btn btn-primary">Aceptar</button>
                                </td>
                            </tr>
                        </form>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
    </div>
@endsection

@section("js")
    <script src="{{ asset('libs/utils/utils.js') }}"></script>
    <script src="{{ asset('libs/lolibox/js/lobibox.min.js') }}"></script>
    <!-- Datatables -->
    <script src="{{ asset('libs/adminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('libs/adminLTE/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
@endsection

@section("scripts")
    <script type="text/javascript">
        $(function () {
        });
    </script>
@endsection