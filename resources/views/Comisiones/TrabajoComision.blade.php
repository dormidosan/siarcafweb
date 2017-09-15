@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('') }}">
@endsection

@section('content')
    <div class="box box-default box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Trabajo de Comision</h3>
        </div>
        <div class="box-body content">
            <h4 class="text-center text-bold">Administrar Trabajo de NOMBRE DE LA COMISION</h4>
            <br>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box ">
                        <span class="info-box-icon bg-orange"><i class="fa fa-file-text-o"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-number">Puntos</span>
                            <a href="#">Acceder</a>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="fa fa-book"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-number">Bitacora</span>
                            <a href="#">Acceder</a>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

            </div>

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-envelope"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-number">Convocatorias</span>
                            <a href="#">Acceder</a>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-folder-o"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-number">Historial de Bitacoras</span>
                            <a href="#">Acceder</a>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

            </div>

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow"><i class="fa fa-check-square-o"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-number">Asistencia</span>
                            <a href="#">Acceder</a>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-maroon"><i class="fa fa-clone"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-number">Historial de Dictamenes</span>
                            <a href="#">Acceder</a>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

            </div>
        </div>
    </div>

@endsection

@section('js')

@endsection

@section('scripts')

@endsection