@extends('layouts.app')

@section("styles")
    <!-- Datatables-->
    <link rel="stylesheet" href="{{ asset('libs/adminLTE/plugins/datatables/dataTables.bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/adminLTE/plugins/datatables/responsive/css/responsive.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/select2/css/select2.css') }}">
@endsection

@section("content")

    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Administrar Integrantes de {{ ucwords($comision->nombre) }}</h3>
        </div>
        <div class="box-body">

            <form id="AgregarAsambleista" name="AgregarAsambleista" class="AgregarAsambleista" method="post" action="">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="nombre">Asambleista</label>
                            <select id="nuevo" name="nuevo[]" class="form-control" multiple="multiple">
                                <option value="">-- Seleccione una Asambleista --</option>
                                @foreach($asambleistas as $asambleista)
                                    <option value="{{ $asambleista->id }}">{{ $asambleista->user->persona->primer_nombre . " " . $asambleista->user->persona->segundo_nombre . " " . $asambleista->user->persona->primer_apellido . " " . $asambleista->user->persona->segundo_apellido }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 text-center">
                        <button type="submit" id="crearComision" name="crearComision" class="btn btn-primary">Agregar
                            Asambleista
                        </button>
                    </div>
                </div>
            </form>

            <br>
            <div class="table-responsive">
                <table id="listado"
                       class="table table-striped table-bordered table-condensed table-hover dataTable text-center">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Sector</th>
                        <th>Facultad</th>
                        <th>Cargo</th>
                        <th>Opcion</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($integrantes as $integrante)
                        <tr>
                            <td>{{ $integrante->asambleista->user->persona->primer_nombre . " " . $integrante->asambleista->user->persona->segundo_nombre . " " . $integrante->asambleista->user->persona->primer_apellido . " " . $integrante->asambleista->user->persona->segundo_apellido }}</td>
                            <td>Estudiantil</td>
                            <td>Ingenieria y Arquitectura</td>
                            <td>Propetario</td>
                            <td>
                                <button class="btn btn-danger btn-xs">Retirar</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>

        </div>
    </div>
@endsection

<style>
    .dataTables_wrapper.form-inline.dt-bootstrap.no-footer > .row {
        margin-right: 0;
        margin-left: 0;
    }
</style>

@section("js")
    <!-- Datatables -->
    <script src="{{ asset('libs/adminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('libs/adminLTE/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('libs/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('libs/select2/js/i18n/es.js') }}"></script>
@endsection


@section("scripts")
    <script type="text/javascript">
        $(function () {

            var oTable = $('#listado').DataTable({
                language: {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                },
                responsive: true

            });

            $('#nuevo').select2({
                placeholder: 'Seleccione un asambleista',
                language: "es"
            });
        });
    </script>
@endsection