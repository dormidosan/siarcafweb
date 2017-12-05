<!-- Pantalla para crear una sesion plenaria -->

@extends('layouts.app')

@section("styles")
    <link rel="stylesheet" href="{{ asset('libs/adminLTE/plugins/icheck/skins/square/green.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/adminLTE/plugins/toogle/css/bootstrap-toggle.min.css') }}">
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
                    <form id="agregarAsambleista" method="post" action="">
                        <div class="input-group input-group-lg input-group-md input-group-sm">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="asambleista" type="text" class="form-control" name="asambleista"
                                   placeholder="Ingrese Asambleista">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-primary">Agregar</button>
                            </div>
                        </div>
                    </form>
                    <br>

                    <div class="panel panel-success">
                        <!-- Default panel contents -->
                        <div class="panel-heading">Ultimos Asambleistas</div>
                        <!-- List group -->
                        <ul class="list-group">
                            <li class="list-group-item">Asambleista 1</li>
                            <li class="list-group-item">Asambleista 1</li>
                            <li class="list-group-item">Asambleista 1</li>
                            <li class="list-group-item">Asambleista 1</li>
                            <li class="list-group-item">Asambleista 1</li>
                        </ul>
                    </div>
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
                            <h2><span style="color: green ;">Codigo : {{ $agenda->codigo}} </span></h2>
                        </div>
                        <div class="col-lg-6 text-center">
                            <div class="input-group-btn">
                                {!! Form::open(['route'=>['iniciar_sesion_plenaria'],'method'=> 'POST']) !!} 
                                <input type="hidden" name="id_agenda" id="id_agenda" value="{{$agenda->id}}">                   
                                <button type="submit" id="iniciar" name="iniciar" class="btn btn-success btn-block"> Iniciar Sesión Plenaria</a>                  
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
                            <a class="btn btn-block btn-primary btn-xs" href="{{ url("GestionarAsistencia") }}">Ciencias Agónómicas</a>
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
                    </div><br>
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
                    </div><br>
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
                    </div><br>

                </div>
            </div>
        </div>
    </div>

    </div>
    @include("Modal.IniciarSesionPlenariaModal")
@endsection

@section("js")
    <!-- Datatables -->
    <script src="{{ asset('libs/adminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('libs/adminLTE/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

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
    </script>
@endsection