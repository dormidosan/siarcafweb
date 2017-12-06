<!-- Pantalla para crear una sesion plenaria -->

@extends('layouts.app')

@section("styles")
    <style>
        .dataTables_wrapper.form-inline.dt-bootstrap.no-footer > .row {
            margin-right: 0;
            margin-left: 0;
        }
    </style>
    <!-- Datatables-->
    <link rel="stylesheet" href="{{ asset('libs/adminLTE/plugins/datatables/dataTables.bootstrap.css') }}">
    <link rel="stylesheet"
          href="{{ asset('libs/adminLTE/plugins/datatables/responsive/css/responsive.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/select2/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/lolibox/css/Lobibox.min.css') }}">
@endsection

@section('breadcrumb')
    <section>
        <ol class="breadcrumb">
            <li><a href="{{ route("inicio") }}"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a>Agenda</a></li>
            <li><a href="{{ route("consultar_agenda_vigentes") }}">Consultar Agendas Vigentes</a></li>
            <li><a class="active">Sesion Plenaria de Agenda {{ $agenda->codigo }}</a></li>
        </ol>
    </section>
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6">
            <div class="box box-default">
                <!--<div class="box-header with-border">
                    <i class="fa fa-user"></i>
                    <h3 class="box-title">Asambleistas</h3>
                </div>-->

                <!-- Contenedor de ingreso de asambleista-->
                <div class="box-body">
                    <form id="AgregarAsambleista" name="AgregarAsambleista" class="AgregarAsambleista" method="post"
                          action="{{ route("agregar_asambleistas_sesion") }}">
                        {{ csrf_field() }}
                        <div class="row hidden">
                            <div class="col-lg-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="nombre">Agenda</label>
                                    <input type="text" id="agenda_id" name="agenda_id" class="form-control"
                                           value="{{ $agenda->id }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="nombre">Asambleista</label>
                                    <select id="asambleistas" name="asambleistas[]" class="form-control"
                                            multiple="multiple">
                                        @foreach($asambleistas as $asambleista)
                                            <option value="{{ $asambleista->id }}">{{ $asambleista->user->persona->primer_nombre . " " . $asambleista->user->persona->segundo_nombre . " " . $asambleista->user->persona->primer_apellido . " " . $asambleista->user->persona->segundo_apellido }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <button type="submit" id="crearComision" name="crearComision" class="btn btn-primary">
                                    Agregar
                                    Asambleista
                                </button>
                            </div>
                        </div>
                    </form>
                    <br>

                    @if(empty($ultimos_ingresos)!=true)
                        <div class="panel panel-success">
                            <!-- Default panel contents -->
                            <div class="panel-heading">Ultimos Asambleistas Ingresados</div>
                            <!-- List group -->
                            <ul class="list-group">
                                @foreach($ultimos_ingresos as $ultimos_ingreso)
                                    <li class="list-group-item"><i
                                                class="fa fa-user"></i> {{ $ultimos_ingreso->asambleista->user->persona->primer_nombre  . " " . $ultimos_ingreso->asambleista->user->persona->segundo_nombre . " " . $ultimos_ingreso->asambleista->user->persona->primer_apellido . " " . $ultimos_ingreso->asambleista->user->persona->segundo_apellido }}
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- contenedor de sección informativa de quorum e inicio de sesión-->
        <div class="col-lg-6 col-sm-6 col-md-6">
            <div class="box box-default">
                <!--<div class="box-header with-border">
                    <i class="fa fa-user"></i>
                    <h3 class="box-title">Asambleistas</h3>
                </div>-->
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-12 text-center text-success">
                            <h3>Código de Sesion Plenaria: <br>{{ $agenda->codigo}}</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>25</h3>
                                    <p>Asambleistas Propetarios</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-users"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 text-center">
                            <div class="input-group-btn">
                                {!! Form::open(['route'=>['iniciar_sesion_plenaria'],'method'=> 'POST']) !!}
                                <input type="hidden" name="id_agenda" id="id_agenda" value="{{$agenda->id}}">
                                <button type="submit" id="iniciar" name="iniciar" class="btn btn-success btn-block">
                                    Iniciar Sesión Plenaria
                                </button>
                            {!! Form::close() !!}
                            <!-- <but-ton type="button" class="btn btn-primary" onclick="mostrarModal()">Iniciar Sesión Plenaria</button> -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered text-center table-stripped">
                        <thead>
                        <tr style="font-weight: bold">
                            <th>Propietarios</th>
                            <th>Calidad de Propietarios</th>
                            <th>Suplente</th>
                            <th>Total de Asistentes</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>20</td>
                            <td>5</td>
                            <td>10</td>
                            <td>36</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
    <div class="box box-danger">
        <div class="box-header with-border text-center">
            <!--Sección que controla la asistencia para las 12 facultades -->
            <div class="panel panel-success">
                <div class="panel-heading">Control de Asistencia</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-3 col-sm-3 col-md-3">
                            <a class="btn btn-block btn-primary btn-xs" href="{{ url("GestionarAsistencia") }}">Ciencias
                                Agónómicas</a>
                        </div>
                        <div class="col-lg-3 col-sm-3 col-md-3">
                            <button type="button" class="btn btn-primary">Facultad 1</button>
                        </div>
                        <div class="col-lg-3 col-sm-3 col-md-3">
                            <button type="button" class="btn btn-primary">Facultad 1</button>
                        </div>
                        <div class="col-lg-3 col-sm-3 col-md-3">
                            <button type="button" class="btn btn-primary">Facultad 1</button>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-3 col-sm-3 col-md-3">
                            <button type="button" class="btn btn-primary">Facultad 1</button>
                        </div>
                        <div class="col-lg-3 col-sm-3 col-md-3">
                            <button type="button" class="btn btn-primary">Facultad 1</button>
                        </div>
                        <div class="col-lg-3 col-sm-3 col-md-3">
                            <button type="button" class="btn btn-primary">Facultad 1</button>
                        </div>
                        <div class="col-lg-3 col-sm-3 col-md-3">
                            <button type="button" class="btn btn-primary">Facultad 1</button>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-3 col-sm-3 col-md-3">
                            <button type="button" class="btn btn-primary">Facultad 1</button>
                        </div>
                        <div class="col-lg-3 col-sm-3 col-md-3">
                            <button type="button" class="btn btn-primary">Facultad 1</button>
                        </div>
                        <div class="col-lg-3 col-sm-3 col-md-3">
                            <button type="button" class="btn btn-primary">Facultad 1</button>
                        </div>
                        <div class="col-lg-3 col-sm-3 col-md-3">
                            <button type="button" class="btn btn-primary">Facultad 1</button>
                        </div>
                    </div>
                    <br>

                </div>
            </div>
        </div>
    </div>

    </div>
    @include("Modal.IniciarSesionPlenariaModal")
@endsection

@section("js")
    <script src="{{ asset('libs/adminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('libs/adminLTE/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('libs/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('libs/select2/js/i18n/es.js') }}"></script>
    <script src="{{ asset('libs/utils/utils.js') }}"></script>
    <script src="{{ asset('libs/lolibox/js/lobibox.min.js') }}"></script>
@endsection


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
                },

            });
        });

        /*Esta función permite mostrar el modal*/
        function mostrarModal() {
            $("#iniciarSesionPlenaria").modal('show')
        }

        $('#asambleistas').select2({
            placeholder: 'Seleccione un asambleista',
            language: "es",
            width: '100%'
        });
    </script>
@endsection

@section("lobibox")

    @if(Session::has('success'))
        <script>
            notificacion("Exito", "{{ Session::get('success') }}", "success");
        </script>
    @endif

@endsection