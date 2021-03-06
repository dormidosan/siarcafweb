@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('libs/lolibox/css/Lobibox.min.css') }}">
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

        table {
            width: 100% !important;
        }

        table tbody tr.group td {
            font-weight: bold;
            text-align: left;
            background: #ddd;
        }

    </style>
@endsection

@section('breadcrumb')
    <section>
        <ol class="breadcrumb">
            <li><a href="{{ route("inicio") }}"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a>Administracion</a></li>
            <li><a>Gestionar Usuarios</a></li>
            <li class="active">Estados Asambleistas</li>
        </ol>
    </section>
@endsection

@section("content")
    <div class="box box-danger ">
        <div class="box-header with-border">
            <h3 class="box-title">Listado de Asambleistas</h3>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table class="table" id="listado">
                    <thead>
                    <tr>
                        <th class="text-center" style="padding-right: 20px !important;">Numero</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Facultad</th>
                        <th class="text-center">Sector</th>
                        <th class="text-center">Cargo</th>
                        <th class="text-center">Accion</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    @php $i = 1 @endphp
                    @foreach($asambleistas as $asambleista)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $asambleista->user->persona->primer_nombre . " " . $asambleista->user->persona->segundo_nombre . " " . $asambleista->user->persona->primer_apellido . " " . $asambleista->user->persona->segundo_apellido }}</td>
                            <td>{{ $asambleista->facultad->nombre }}</td>
                            <td>{{ $asambleista->sector->nombre }}</td>
                            <td>{{ $asambleista->propietario?'Propetario':'Suplente' }}</td>
                            <td class="row text-center">
                                <div class="col-lg-6 col-sm-6 col-lg-push-1">
                                    @if($asambleista->baja == 0)
                                        <button class="btn btn-danger btn-xs btn-block"
                                                onclick="modificar_estado({{ $asambleista->id }},1)"><i
                                                    class="fa fa-minus-circle"></i>
                                            Baja
                                        </button>
                                    @else
                                        <button class="btn btn-success btn-xs btn-block"
                                                onclick="modificar_estado({{ $asambleista->id }},2)"><i
                                                    class="fa fa-plus-circle"></i>
                                            Alta
                                        </button>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    @if($asambleista->activo == 1)
                                        <button class="btn btn-warning btn-xs btn-block"
                                                onclick="modificar_estado({{ $asambleista->id }},3)"><i
                                                    class="fa fa-lock"></i>
                                            Desactivar
                                        </button>
                                    @else
                                        <button class="btn btn-primary btn-xs btn-block"
                                                onclick="modificar_estado({{ $asambleista->id }},4)">
                                            <i class="fa fa-unlock"></i>
                                            Activar
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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
            var table = $('#listado').DataTable({
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
                "columnDefs": [
                    {"visible": false, "targets": 2},
                    {"orderable": false, "targets": [1, 2, 3, 4, 5]}
                ],
                "searching": true,
                "order": [[0, 'asc'], [2, 'asc']],
                "displayLength": 25,
                "paging": true,
                "drawCallback": function (settings) {
                    var api = this.api();
                    var rows = api.rows({page: 'current'}).nodes();
                    var last = null;

                    api.column(2, {page: 'current'}).data().each(function (group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before(
                                '<tr class="group"><td colspan="5">' + group + '</td></tr>'
                            );

                            last = group;
                        }
                    });
                }
            });

            // Order by the grouping
            $('#listado tbody').on('click', 'tr.group', function () {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                }
                else {
                    table.order([2, 'asc']).draw();
                }
            });
        });

        function modificar_estado(id, accion) {

            console.log("A");
            $.ajax({
                //se envia un token, como medida de seguridad ante posibles ataques
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                type: 'POST',
                url: "{{ route('modificar_estado_asambleista') }}",
                data: {
                    "id": id,
                    "accion": accion
                },
                success: function (response) {
                    notificacion(response.mensaje.titulo, response.mensaje.contenido, response.mensaje.tipo);
                    setTimeout(function () {
                        window.location.href = "{{ route("baja_asambleista") }}"
                    }, 900);
                }
            });
        }
    </script>

@endsection
