@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('libs/datepicker/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
    <link href="{{ asset('libs/file/css/fileinput.min.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/file/themes/explorer/theme.min.css') }}" rel="stylesheet">
@endsection

@section("content")
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Definir Periodo AGU</h3>
        </div>
        <div class="box-body">
            <form id="periodo_agu" name="periodo_agu" method="post" action="">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="nombre_periodo">Periodo</label>
                            <input type="text" class="form-control" id="nombre_periodo" placeholder="Ingrese un nombre">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="inicio">Fecha</label>
                            <div class="input-group date fecha">
                                <input id="inicio" type="text" class="form-control" placeholder="dd/mm/yyyy"><span
                                        class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="excel">Subir Excel</label>
                            <div>
                                <input id="excel" name="excel" type="file" placeholder="Subir archivo"
                                       accept=".xls,.xlsx">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-lg-6 col-lg-offset-3">
                        <button type="submit" class="btn btn-success btn-block">Aceptar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Listado Periodos AGU</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table class="text-center table">
                    <thead>
                    <tr>
                        <th>Periodo</th>
                        <th>Asambleistas</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>2015-2017</td>
                        <td><button id="descargar" name="descargar" class="btn  btn-xs btn-info">Descargar</button></td>
                        <td><button name="finalizar" name="finalizar" class="btn btn-xs btn-danger">Finalizar</button></td>
                    </tr>
                    <tr>
                        <td>2015-2017</td>
                        <td><button id="descargar" name="descargar" class="btn  btn-xs btn-info">Descargar</button></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>2015-2017</td>
                        <td><button id="descargar" name="descargar" class="btn  btn-xs btn-info">Descargar</button></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>2015-2017</td>
                        <td><button id="descargar" name="descargar" class="btn  btn-xs btn-info">Descargar</button></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>2015-2017</td>
                        <td><button id="descargar" name="descargar" class="btn  btn-xs btn-info">Descargar</button></td>
                        <td></td>
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
    <script src="{{ asset('libs/file/js/fileinput.min.js') }}"></script>
    <script src="{{ asset('libs/file/themes/explorer/theme.min.js') }}"></script>
    <script src="{{ asset('libs/file/js/locales/es.js') }}"></script>
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

            $("#excel").fileinput({
                browseClass: "btn btn-primary btn-block",
                previewFileType: ".xls,.xlsx",
                theme: "explorer",
                //uploadUrl: "/file-upload-batch/2",
                language: "es",
                minFileCount: 1,
                maxFileCount: 1,
                allowedFileExtensions: ['xls', 'xlsx'],
                showUpload: false,
                showPreview: false,
                showCaption: false,
                fileActionSettings: {
                    showRemove: true,
                    showUpload: false,
                    showZoom: true,
                    showDrag: false
                },
                hideThumbnailContent: true
            });

        });
    </script>
@endsection