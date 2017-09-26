@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('libs/datepicker/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/adminLTE/plugins/toogle/css/bootstrap-toggle.min.css') }}">
@endsection

@section("content")
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Asistencia de Comision</h3>
        </div>

        <div class="box-body">
            <div class="row text-center">
                <div class="col-sm-6 col-md-6 col-lg-6 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
                    <div class="form-group">
                        <label for="fecha">Fecha</label>
                        <div class="input-group date fecha">
                            <input id="fecha" type="text" class="form-control"><span class="input-group-addon"><i
                                        class="glyphicon glyphicon-th"></i></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-sm-12 col-lg-offset-2">
                    <button type="button" id="iniciar" name="iniciar" class="btn btn-success btn-block">Iniciar</button>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <button type="button" id="iniciar" name="iniciar" class="btn btn-danger btn-block">Finalizar</button>
                </div>
            </div>

            <br>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Asambleistas</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead>
                            <tr>
                                <th>Asambleista</th>
                                <th>Hora Entrada</th>
                                <th>Presente</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <td>Asambleista 1</td>
                                <td>04:45 P.M</td>
                                <td><input type="checkbox" id="#t1" name="t1" class="toogle" data-size="mini" data-onstyle="success" data-offstyle="danger"></td>
                            </tr>
                            <tr>
                                <td>Asambleista 1</td>
                                <td>04:45 P.M</td>
                                <td><input type="checkbox" id="#t1" name="t1" class="toogle" data-size="mini" data-onstyle="success" data-offstyle="danger"></td>
                            </tr>
                            <tr>
                                <td>Asambleista 1</td>
                                <td>04:45 P.M</td>
                                <td><input type="checkbox" id="#t1" name="t1" class="toogle" data-size="mini" data-onstyle="success" data-offstyle="danger"></td>
                            </tr>
                            <tr>
                                <td>Asambleista 1</td>
                                <td>04:45 P.M</td>
                                <td><input type="checkbox" id="#t1" name="t1" class="toogle" data-size="mini" data-onstyle="success" data-offstyle="danger"></td>
                            </tr>
                            <tr>
                                <td>Asambleista 1</td>
                                <td>04:45 P.M</td>
                                <td><input type="checkbox" id="#t1" name="t1" class="toogle" data-size="mini" data-onstyle="success" data-offstyle="danger"></td>
                            </tr>
                            <tr>
                                <td>Asambleista 1</td>
                                <td>04:45 P.M</td>
                                <td><input type="checkbox" id="#t1" name="t1" class="toogle" data-size="mini" data-onstyle="success" data-offstyle="danger"></td>
                            </tr>
                            <tr>
                                <td>Asambleista 1</td>
                                <td>04:45 P.M</td>
                                <td><input type="checkbox" id="#t1" name="t1" class="toogle" data-size="mini" data-onstyle="success" data-offstyle="danger"></td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>




    </div>
@endsection

@section("js")
    <script src="{{ asset('libs/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('libs/datepicker/locales/bootstrap-datepicker.es.min.js') }}"></script>
    <script src="{{ asset('libs/datetimepicker/js/moment.min.js') }}"></script>
    <script src="{{ asset('libs/datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('libs/adminLTE/plugins/toogle/js/bootstrap-toggle.min.js') }}"></script>
@endsection


@section("scripts")
    <script type="text/javascript">
        $(function () {
            $('.input-group.date.fecha').datepicker({
                format: "dd/mm/yyyy",
                clearBtn: true,
                language: "es",
                autoclose: true,
                todayHighlight: true,
                toggleActive: true
            });

            $('.toogle').bootstrapToggle({
                on: 'Presente',
                off: 'Ausente'
            });
        });
    </script>
@endsection