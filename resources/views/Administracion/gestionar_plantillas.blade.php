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
    <div class="panel panel-success">
                <div class="panel-heading">Plantillas del Sistema</div>
                <div class="panel-body">
                    <table id="parametros"
                       class="table table-striped table-bordered table-condensed table-hover text-center">
                    <thead>
                    <tr>
                        <th width="10%">Codigo plantilla</th>
                        <th width="25%">Nombre plantilla</th>
                        <th width="10%">Descargar</th>
                        <th colspan="2">Actualizar</th>
                    </tr>
                    </thead>

                    <tbody id="cuerpoTabla">
                    @forelse($plantillas as $plantilla)
                        <tr>
                        <form id="{{$plantilla->id}}" name="almacenar_plantilla" method="post" action="{{ url('almacenar_plantilla') }}" enctype="multipart/form-data" >
                        {{ csrf_field() }}
                            <input type="hidden" name="id_plantilla" id="id_plantilla" value="{{$plantilla->id}}">
                            <td>{!! $plantilla->codigo !!}</td>
                            <td>{!! $plantilla->nombre !!}</td>
                            <td>
                                <a class="btn btn-success btn-xs"
                                   href="descargar_plantilla/<?= $plantilla->id; ?>" role="button">
                                    <i class="fa fa-download"></i> Descargar</a>
                            </td>
                            <td>
                                <!-- 
                    USANDO CLASE<input id="documento_plantilla<?=$plantilla->id?>" class="pla" name="documento_plantilla" type="file" data-show-preview="false" required >  
     USANDO JQUERY QUE ENCONTRE <input id="documento_plantilla<?=$plantilla->id?>" name="documento_plantilla" type="file" class="file" data-show-preview="false" required="required"> -->
                                <input id="documento_plantilla<?=$plantilla->id?>" name="documento_plantilla" type="file"   data-show-preview="false" required="required">
                            </td>
                            <td width="10%">
                                <button type="submit" class="btn btn-primary btn-block btn-xs"><i class="fa fa-pencil"></i> Actualizar</button>
                            </td>
                        </form>
                        </tr>
                    @empty

                    @endforelse

                    </tbody>

                </table>

                 
                </div>
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



            $(function () {
            $(".pla").fileinput({
                theme: "explorer",
                previewFileType: "pdf, xls, xlsx, doc, docx",
                language: "es",
                //minFileCount: 1,
                maxFileCount: 3,
                allowedFileExtensions: ['docx','doc','pdf','xls','xlsx'],
                showUpload: false,
                fileActionSettings: {
                    showRemove: true,
                    showUpload: false,
                    showZoom: true,
                    showDrag: false
                },
                hideThumbnailContent: true
            });
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