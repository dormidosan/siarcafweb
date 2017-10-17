@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('libs/datepicker/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
@endsection

@section("content")
    <div class="box box-danger">
        <div class="box-header">
            <h3 class="box-title">Consultar Historial de Agendas</h3>
        </div>

        <div class="box-body">
            <form id="consultar_agenda" class="form-inline" name="consultar_agenda" method="post" action="">
                <div class="form-group">
                    <label for="fecha_inicio">Fecha Inicial</label>
                    <div class="input-group date fecha">
                        <input id="fecha_inicial" name="fecha_inicial" type="text" class="form-control" placeholder="dd/mm/yyyy"><span class="input-group-addon" ><i class="glyphicon glyphicon-th"></i></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="fecha_inicio">Fecha Final</label>
                    <div class="input-group date fecha">
                        <input id="fecha_final" name="fecha_final" type="text" class="form-control" placeholder="dd/mm/yyyy"><span class="input-group-addon" ><i class="glyphicon glyphicon-th"></i></span>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Iniciar Busqueda</button>
            </form>
            <br>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Historial de Agendas</h3>
                </div>
                <table class="table text-center">
                    <thead>
                    <tr>
                        <th>Agendas</th>
                        <th>Actas de Sesion</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Agenda 78</td>
                        <td><button class="btn btn-xs btn-block btn-success">Descargar</button></td>
                    </tr>
                    <tr>
                        <td>Agenda 77</td>
                        <td><button class="btn btn-xs btn-block btn-success">Descargar</button></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection

@section("js")
    <script src="{{ asset('libs/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('libs/datepicker/locales/bootstrap-datepicker.es.min.js') }}"></script>
    <script src="{{ asset('libs/datetimepicker/js/moment.min.js') }}"></script>
    <script src="{{ asset('libs/datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
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

            $('#hora').datetimepicker({
                format: 'LT',
            });
        });
    </script>
@endsection