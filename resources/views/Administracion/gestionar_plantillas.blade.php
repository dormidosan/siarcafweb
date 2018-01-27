@extends('layouts.app')

@section('styles')
    <link href="{{ asset('libs/file/css/fileinput.min.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/file/themes/explorer/theme.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('libs/lolibox/css/Lobibox.min.css') }}">
@endsection

@section('breadcrumb')
    <section>
        <ol class="breadcrumb">
            <li><a href="{{ route("inicio") }}"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a>Administracion</a></li>
            <li><a class="active">Plantillas</a></li>
        </ol>
    </section>
@endsection

@section("content")
    {{-- <div class="panel panel-success">
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
            </div>--}}
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs pull-right">
            <li class=""><a href="#tab_administrar" data-toggle="tab" aria-expanded="false">Administar</a></li>
            <li class="active"><a href="#tab_agregar" data-toggle="tab" aria-expanded="true">Agregar</a></li>
            <li class="pull-left header"><i class="fa fa-files-o"></i>Plantillas</li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_agregar">
                <div class="file-loading">
                    <input id="plantillas" name="plantillas[]" type="file" accept=".xlsx, .xls, .doc, .docx" multiple>
                </div>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_administrar">
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descargar</th>
                            <th>Actualizar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($plantillas->isEmpty())
                            <tr>
                                <td colspan="3">No existen plantillas en el sistema</td>
                            </tr>
                        @else
                            @foreach($plantillas as $plantilla)
                                <tr>
                                    <td>{{$plantilla->nombre}}</td>
                                    <td><a href="" class="btn btn-primary btn-xs">Descargar</a></td>
                                    <td><a href="" class="btn btn-primary btn-xs">Actualizar</a></td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
    </div>
    @include("Modal.ActualizarPlantillaModal")
@endsection

@section("js")
    <script src="{{ asset('libs/utils/utils.js') }}"></script>
    <script src="{{ asset('libs/file/js/fileinput.min.js') }}"></script>
    <script src="{{ asset('libs/file/themes/explorer/theme.min.js') }}"></script>
    <script src="{{ asset('libs/file/js/locales/es.js') }}"></script>
    <script src="{{ asset('libs/lolibox/js/lobibox.min.js') }}"></script>
@endsection

@section("scripts")
    <script type="text/javascript">
        $(function () {
            $("#plantillas").fileinput({
                theme: "explorer",
                uploadAsync: false, //para enviar todos los archivos como uno solo
                language: "es",
                minFileCount: 1,
                allowedFileExtensions: ['doc', 'docx', 'xls', 'xlsx'],
                fileActionSettings: {
                    showZoom: false,
                    showRemove: false,
                    showUpload: false
                    //showDrag: false
                },
                uploadUrl: "{{ route("agregar_plantillas") }}",
                uploadExtraData: {_token: "{{ csrf_token() }}"}
                //previewFileType: "pdf",
                //maxFileCount: 1,
                //showUpload: false,
                //showPreview: false,
                //hideThumbnailContent: true
            });

            // CATCH RESPONSE, usa si se envia por ajax con el boton q este js trae
            $('#plantillas').on('filebatchuploaderror', function (event, data, previewId, index) {
                var form = data.form, files = data.files, extra = data.extra,
                    response = data.response, reader = data.reader;

            });

            $('#plantillas').on('filebatchuploadsuccess', function (event, data, previewId, index) {
                var form = data.form, files = data.files, extra = data.extra,
                    response = data.response, reader = data.reader;
                notificacion(response.mensaje.titulo, response.mensaje.contenido, response.mensaje.tipo);
                setTimeout(function () {
                    window.location.href = '{{ route("gestionar_plantillas") }}';
                }, 1000);

            });
        });

        function mostrarModal(id) {
            $("#plantilla_id").val("id");
            $("#actualizarPlantilla").modal('show');
        }
    </script>

@endsection