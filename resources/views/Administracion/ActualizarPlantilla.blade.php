@extends('layouts.app')

@section('styles')
    <link href="{{ asset('libs/file/css/fileinput.min.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/file/themes/explorer/theme.min.css') }}" rel="stylesheet">
@endsection

@section("content")
    <div class="box box-danger">
        <div class="box-header with-border text-center">
            <!--Sección que controla la asistencia para las 12 facultades -->
            <div class="panel panel-success">
                <div class="panel-heading">Plantillas del Sistema</div>
                <div class="panel-body">
                    <table class="table table-bordered text-center">
                        <thead>
                        <tr>
                            <th>Plantilla</th>
                            <th>Descargar</th>
                            <th>Actualizar</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <!-- OJO HAY Q CAMBIAR EL ID POR EL DEL DOC EN LA BD -->
                            <td id="plantilla1" name="plantilla1">Plantilla</td>
                            <td id="descargarPlantilla1" name="descargarPlantilla1">
                                <button class="btn btn-primary btn-xs">Descargar</button>
                            </td>
                            <td>
                                <!-- aqui se le pasa el id de la plantilla en la funcion mostrarModal(id)-->
                                <button class="btn btn-primary btn-xs" onclick="mostrarModal(1)">Actualizar</button>
                            </td>
                        </tr>
                        <tr>
                            <!-- OJO HAY Q CAMBIAR EL ID POR EL DEL DOC EN LA BD -->
                            <td id="plantilla2" name="plantilla2">Plantilla</td>
                            <td id="descargarPlantilla2" name="descargarPlantilla2">
                                <button class="btn btn-primary btn-xs">Descargar</button>
                            </td>
                            <td>
                                <!-- aqui se le pasa el id de la plantilla en la funcion mostrarModal(id)-->
                                <button class="btn btn-primary btn-xs" onclick="mostrarModal(2)">Actualizar</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include("Modal.ActualizarPlantillaModal")
@endsection

@section("js")
    <script src="{{ asset('libs/file/js/fileinput.min.js') }}"></script>
    <script src="{{ asset('libs/file/themes/explorer/theme.min.js') }}"></script>
    <script src="{{ asset('libs/file/js/locales/es.js') }}"></script>
@endsection


@section("scripts")
    <script type="text/javascript">
        $(function () {
            $("#plantilla").fileinput({
                theme: "explorer",
                //uploadUrl: "/file-upload-batch/2",
                language: "es",
                minFileCount: 1,
                maxFileCount: 1,
                allowedFileExtensions: ['pdf'],
                showUpload: false,
                showPreview: false,
                fileActionSettings: {
                    showRemove: true,
                    showUpload: false,
                    showZoom: true,
                    showDrag: false
                },
                hideThumbnailContent: true
            });
        });

        function mostrarModal(id) {
            $("#plantilla_id").val("id");
            $("#actualizarPlantilla").modal('show');
        }
    </script>

@endsection