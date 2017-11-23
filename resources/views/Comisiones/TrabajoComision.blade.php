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

            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-lg-offset-1">
                    <div class="box box-info">
                        <div class="box-body">
                            <form id="listado_peticiones_comision" name="listado_peticiones_comision"
                                  method="post" action="{{ url("listado_peticiones_comision") }}" target="_blank">
                                {{ csrf_field() }}
                                <div class="text-center">
                                    <i class="fa fa-file-text-o fa-4x text-info"></i>
                                </div>
                                <h3 class="profile-username text-center">Peticiones</h3>
                                <input class="hidden" id="comision_id" name="comision_id" value="{{$comision->id}}">
                                <button type="submit" class="btn btn-info btn-block btn-sm"><b>Acceder</b></button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 col-lg-offset-2">
                    <div class="box box-danger">
                        <div class="box-body">
                            <form id="listado_peticiones_comision" name="listado_peticiones_comision"
                                  method="post" action="{{ url("listado_peticiones_comision") }}" target="_blank">
                                {{ csrf_field() }}
                                <div class="text-center">
                                    <i class="fa fa-book fa-4x text-red"></i>
                                </div>
                                <h3 class="profile-username text-center">Generar Bitacora</h3>
                                <input class="hidden" id="comision_id" name="comision_id" value="{{$comision->id}}">
                                <button type="submit" class="btn btn-danger btn-block btn-sm"><b>Acceder</b></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-lg-offset-1">
                    <div class="box box-success">
                        <div class="box-body">
                            <form id="listado_peticiones_comision" name="listado_peticiones_comision"
                                  method="post" action="{{ url("listado_peticiones_comision") }}" target="_blank">
                                {{ csrf_field() }}
                                <div class="text-center">
                                    <i class="fa fa-envelope fa-4x text-green"></i>
                                </div>
                                <h3 class="profile-username text-center">Convocatorias</h3>
                                <input class="hidden" id="comision_id" name="comision_id" value="{{$comision->id}}">
                                <button type="submit" class="btn btn-success btn-block btn-sm"><b>Acceder</b></button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 col-lg-offset-2">
                    <div class="box box-warning">
                        <div class="box-body">
                            <form id="listado_peticiones_comision" name="listado_peticiones_comision"
                                  method="post" action="{{ url("listado_peticiones_comision") }}" target="_blank">
                                {{ csrf_field() }}
                                <div class="text-center">
                                    <i class="fa fa-folder-open-o fa-4x text-warning"></i>
                                </div>
                                <h3 class="profile-username text-center">Historial Bitacoras</h3>
                                <input class="hidden" id="comision_id" name="comision_id" value="{{$comision->id}}">
                                <button type="submit" class="btn btn-warning btn-block btn-sm"><b>Acceder</b></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-lg-offset-1">
                    <div class="box" style="border-top-color: #D81B60">
                        <div class="box-body">
                            <form id="listado_reunione_comision" name="listado_reuniones_comision"
                                  method="post" action="{{ url("listado_reuniones_comision") }}" target="_blank">
                                {{ csrf_field() }}
                                <div class="text-center">
                                    <i class="fa fa-group fa-4x text-maroon"></i>
                                </div>
                                <h3 class="profile-username text-center">Reuniones</h3>
                                <input class="hidden" id="comision_id" name="comision_id" value="{{$comision->id}}">
                                <button type="submit" class="btn bg-maroon btn-block btn-sm"><b>Acceder</b></button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 col-lg-offset-2">
                    <div class="box" style="border-top-color: #39CCCC">
                        <div class="box-body">
                            <form id="listado_peticiones_comision" name="listado_peticiones_comision"
                                  method="post" action="{{ url("listado_peticiones_comision") }}" target="_blank">
                                {{ csrf_field() }}
                                <div class="text-center">
                                    <i class="fa fa-clone fa-4x text-teal"></i>
                                </div>
                                <h3 class="profile-username text-center">Historial Dictamenes</h3>
                                <input class="hidden" id="comision_id" name="comision_id" value="{{$comision->id}}">
                                <button type="submit" class="btn bg-teal btn-block btn-sm"><b>Acceder</b></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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