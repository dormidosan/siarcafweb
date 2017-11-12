@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('') }}">
@endsection

@section('content')
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Trabajo de Comision</h3>
        </div>

        <div class="box-body">
            <h4 class="text-center text-bold">Administrar trabajo de {{ $comision->nombre }}</h4>
            <br>
            <div class="row ">
                <div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-1">
                    <div class="info-box">
                        <span class="info-box-icon bg-orange"><i class="fa fa-file-text-o"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-number">Peticiones</span>
                            <form id="listado_peticiones_comision" name="listado_peticiones_comision"
                                  method="post" action="{{ url("listado_peticiones_comision") }}" target="_blank">
                                {{ csrf_field() }}
                                <input class="hidden" id="comision_id" name="comision_id" value="{{$comision->id}}">
                                <button type="submit" class="btn btn-xs btn-info">Acceder</button>
                            </form>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-1">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="fa fa-book"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-number">Generar Bitacora</span>
                            <a href="#">Acceder</a>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

            </div>

            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-1">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-envelope"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-number">Convocatorias</span>
                            <a href="{{ url("ConvocatoriaComision") }}">Acceder</a>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <div class="text-center">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <h3 class="profile-username text-center">Peticiones</h3>
                            <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                </div>

                <div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-1">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-folder-o"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-number">Historial de Bitacoras</span>
                            <a href={{ url("/HistorialBitacoras") }}>Acceder</a>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

            </div>

            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-1">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow"><i class="fa fa-check-square-o"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-number">Reuniones</span>
                            <a href="{{url("/AsistenciaComision")}}">Acceder</a>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-1">
                    <div class="info-box">
                        <span class="info-box-icon bg-maroon"><i class="fa fa-clone"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-number">Historial de Dictamenes</span>
                            <a href={{ url("/HistorialDictamenes") }}>Acceder</a>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

            </div>

            <br>
        </div>

        <div class="box-body table-responsive">
            <table id="trabajoComision" class="table table-bordered table-hover text-center">

                <thead class="text-bold">
                <tr>
                    <th>Puntos Pendientes</th>
                    <th>Puntos Resueltos</th>
                    <th>Dictamenes Creados</th>
                    <th>Sesiones Realizadas</th>
                </tr>
                </thead>

                <tbody id="cuerpoTabla" class="text-red text-bold">
                <tr>
                    <td>4</td>
                    <td>50</td>
                    <td>30</td>
                    <td>45</td>
                </tr>
                </tbody>

            </table>
        </div>
    </div>

@endsection

@section('js')

@endsection

@section('scripts')

@endsection