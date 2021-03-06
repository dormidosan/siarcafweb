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

@section('breadcrumb')
    <section>
        <ol class="breadcrumb">
            <li><a href="{{ route("inicio") }}"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a>Comisiones</a></li>
            <li><a href="{{ route("administrar_comisiones") }}">Listado de Comisiones</a></li>
            <li><a href="javascript:document.getElementById('trabajo_comision').submit();">Trabajo de Comision</a></li>
            <li class="active">Historial Dictamenes</li>
        </ol>
    </section>
@endsection

@section('content')
    <div class="hidden">
        <form id="trabajo_comision" name="trabajo_comision" method="post"
              action="{{ route("trabajo_comision") }}">
            {{ csrf_field() }}
            <input class="hidden" id="comision_id" name="comision_id" value="{{$comision->id}}">
            <button class="btn btn-success btn-xs">Acceder</button>
        </form>
    </div>
    <?php $i = 1; ?>
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Listado de Dictamentes</h3>
        </div>
        <div class="box-body table-responsive">
            <table id="resultadoDocs" class="table table-striped table-bordered table-hover text-center">
                <thead>
                <tr>
                    <th>Codigo reunion</th>
                    <th>Nombre Dictamen</th>
                    <th>Fecha Creacion</th>
                    <th colspan="2">Accion</th>
                </tr>
                </thead>

                <tbody id="cuerpoTabla">
                @forelse($seguimientos as $seguimiento)  <!-- $$$$$$$$$$$$$ -->
                        @if($seguimiento->documento->tipo_documento_id == 3)
                            <tr>
                                <td>
                                    @if($seguimiento->reunion)
                                        {!! $seguimiento->reunion->codigo !!}
                                    @else
                                        N/A
                                    @endif
                                </td>

                                <td>{!! $seguimiento->documento->nombre_documento !!}</td>
                                <td>{{ date("d-m-Y h:i A",strtotime($seguimiento->documento->fecha_ingreso)) }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6 col-md-6">
                                            <a class="btn btn-primary btn-xs btn-block" href="{{ asset($disco.''.$seguimiento->documento->path) }}"
                                               role="button" target="_blank"><i class="fa fa-eye"></i> Ver</a>
                                        </div>
                                        <div class="col-lg-6 col-sm-6 col-md-6">
                                            <a class="btn btn-success btn-xs btn-block"
                                               href="descargar_documento/<?= $seguimiento->documento->id; ?>" role="button">
                                                <i class="fa fa-download"></i> Descargar</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endif
                  
                @empty <!-- $$$$$$$$$$$$$ -->
                    
                        <p style="color: red ;">No hay criterios de busqueda</p>
                    
                @endforelse <!-- $$$$$$$$$$$$$ -->

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
                columnDefs: [{orderable: false, targets: [0, 2]}],
                order: [[1, 'asc']]

            });
        });
    </script>

@endsection