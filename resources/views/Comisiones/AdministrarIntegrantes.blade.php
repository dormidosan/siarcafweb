@extends('layouts.app')

@section("styles")
    <!-- Datatables-->
    <link rel="stylesheet" href="{{ asset('libs/adminLTE/plugins/datatables/dataTables.bootstrap.css') }}">
    <link rel="stylesheet"
          href="{{ asset('libs/adminLTE/plugins/datatables/responsive/css/responsive.bootstrap.min.css') }}">
@endsection

@section("content")
    <div class="box box-solid box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Administrar Integrantes de Comision</h3>
        </div>
        <div class="box-body">
            <form id="AgregarAsambleista" name="AgregarAsambleista" class="">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="nombre">Asambleista</label>
                            <input type="text" class="form-control" placeholder="Ingrese el nombre del Asambleista"
                                   id="nombre"
                                   name="nombre">
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
            <br>
            <!--<label for="listadoAsambleistas">Listado de Asambleistas</label>-->
            <div class="table-responsive no-padding">
                <table id="listadoAsambleistas"
                       class="table table-bordered table-hover text-center">
                    <thead class="text-bold">
                    <tr>
                        <th>Nombre</th>
                        <th>Sector</th>
                        <th>Facultad</th>
                        <th>Cargo</th>
                        <th>Opcion</th>
                    </tr>
                    </thead>

                    <tbody id="cuerpoTabla">
                    <tr>
                        <td>Jonatan Benjamin Lopez Henriquez</td>
                        <td>Estudiantil</td>
                        <td>Ingenieria y Arquitectura</td>
                        <td>Propetario</td>
                        <td>
                            <button class="btn btn-danger btn-sm">Retirar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Jonatan Benjamin Lopez Henriquez</td>
                        <td>Estudiantil</td>
                        <td>Ingenieria y Arquitectura</td>
                        <td>Propetario</td>
                        <td>
                            <button class="btn btn-danger btn-sm">Retirar</button>
                        </td>
                    </tr>
                    </tbody>

                </table>
            </div>

        </div>
    </div>
@endsection

@section("js")
    <!-- Datatables -->
    <script src="{{ asset('libs/adminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('libs/adminLTE/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

@endsection


@section("scripts")
    <script type="text/javascript">
        $(function () {
            $('#listadoAsambleistas').DataTable({
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
                "order": [[1, "asc"]],
                "columnDefs": [
                    {"orderable": false, "targets": 4}
                ],

            });
        });
    </script>
@endsection