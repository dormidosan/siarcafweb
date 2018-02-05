@extends('layouts.app')

@section('styles')
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

@section('content')
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Historial de  Bitacoras</h3>
        </div>
        <!--
        <div class="box-body">
            <form id="crearbuscar" name="buscar" method="post" action="#">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label>Descripcion</label>
                            <input type="text" class="form-control" placeholder="Ingrese una descripcion"
                                   id="descripcion"
                                   name="descripcion">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <button type="submit" id="buscar" name="buscar" class="btn btn-primary">Buscar
                        </button>
                    </div>
                </div>
            </form>
        </div>
        -->
    </div>

    <?php $i = 1; ?>
    <div class="box box-solid box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Listado de Bitacoras</h3>
        </div>
        <div class="box-body table-responsive">
            <table id="resultadoDocs"
                   class="table table-striped table-bordered table-hover text-center">
                <thead>
                <tr>
                    <th colspan="2">Nombre Bitacora</th>
                    <th>Fecha Creacion</th>
                    <th>Lugar</th>
                    <th>Accion</th>
                </tr>
                </thead>

                <tbody id="cuerpoTabla">
                @forelse($reuniones as $reunion)
                    @forelse($reunion->documentos as $documento)
                            @if($documento->tipo_documento_id == 7)
                            <tr>
                                <td>{!! $documento->nombre_documento !!}</td>
                                <td>{!! $documento->tipo_documento->tipo !!}</td>                                  
                                <td>{!! $reunion->codigo !!}</td>
                                <td>{!! $reunion->lugar !!}</td>
                                <td>
                                    <a class="btn btn-primary btn-xs btn-block" href="{{ asset($disco.''.$documento->path) }}"
                                       role="button" target="_blank"><i class="fa fa-eye"></i> Ver</a>
                                </td>
                                <td>
                                    <a class="btn btn-success btn-xs btn-block"
                                       href="descargar_documento/<?= $documento->id; ?>" role="button">
                                        <i class="fa fa-download"></i> Descargar</a>
                                </td>
                            </tr>
                            @endif
                        @empty
                        <!-- <p style="color: red ;">No hay criterios de busqueda</p> -->
                        <?php $text1 = 1; ?>
                        @endforelse
                @empty
                    @if($text1 == 1)
                        <p style="color: red ;">No hay criterios de busqueda</p>
                    @endif
                @endforelse
                
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

@section("scripts")
    <script type="text/javascript">
        $(function () {
            var oTable = $('#resultadoDocs').DataTable({
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
                responsive: true,
                columnDefs: [{orderable: false, targets: [0, 5]}],
                order: [[1, 'asc']]

            });
        });
    </script>

@endsection