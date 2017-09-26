@extends('layouts.app')

@section("styles")
    <!-- Datatables-->
    <link rel="stylesheet" href="{{ asset('libs/adminLTE/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection

@section('content')
    <div class="box box-solid box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Listado Comisiones</h3>
        </div>
        <div class="box-body table-responsive">
            <table id="listadoComisiones"
                   class="table text-center">
                <thead>
                <tr>
                    <th>Nombre Documento</th>
                    <th>Numero Integrantes</th>
                    <th>Integrantes</th>
                    <th>Administracion</th>
                </tr>
                </thead>

                <tbody id="cuerpoTabla">
                <tr>
                    <td>Comision de Legislacion</td>
                    <td>15</td>
                    <td><a class="btn btn-block btn-primary btn-xs" href="{{ url("AdministrarIntegrantes") }}">Gestionar</a></td>
                    <td><a class="btn btn-success btn-block btn-xs" href="{{ url("TrabajoComision") }}">Acceder</a></td>
                </tr>
                <tr>
                    <td>Comision de Presupuesto</td>
                    <td>15</td>
                    <td><a class="btn btn-block btn-primary btn-xs" href="{{ url("AdministrarIntegrantes") }}">Gestionar</a></td>
                    <td><a class="btn btn-success btn-block btn-xs" href="{{ url("TrabajoComision") }}">Acceder</a></td>
                </tr>
                <tr>
                    <td>Comision de Convenios</td>
                    <td>15</td>
                    <td><a class="btn btn-block btn-primary btn-xs" href="{{ url("AdministrarIntegrantes") }}">Gestionar</a></td>
                    <td><a class="btn btn-success btn-block btn-xs" href="{{ url("TrabajoComision") }}">Acceder</a></td>
                </tr>
                <tr>
                    <td>Comision de arte y cultura</td>
                    <td>15</td>
                    <td><a class="btn btn-block btn-primary btn-xs" href="{{ url("AdministrarIntegrantes") }}">Gestionar</a></td>
                    <td><a class="btn btn-success btn-block btn-xs" href="{{ url("TrabajoComision") }}">Acceder</a></td>
                </tr>
                <tr>
                    <td>Comision de arte y cultura</td>
                    <td>15</td>
                    <td><a class="btn btn-block btn-primary btn-xs" href="#">Gestionar</a></td>
                    <td><a class="btn btn-success btn-block btn-xs" href="{{ url("TrabajoComision") }}">Acceder</a></td>
                </tr>

                </tbody>

            </table>

        </div>
    </div>
@endsection

@section("js")
    <!-- Datatables -->
    <script src="{{ asset('libs/adminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('libs/adminLTE/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

@endsection


<style>
    .dataTables_wrapper.form-inline.dt-bootstrap.no-footer > .row {
        margin-right: 0;
        margin-left: 0;
    }
</style>

@section("scripts")
    <script type="text/javascript">
        $(function () {
            var oTable = $('#listadoComisiones').DataTable({
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
                }

            });
        });
    </script>
@endsection