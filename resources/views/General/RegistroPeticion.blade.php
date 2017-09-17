@extends('layouts.app')

@section('styles')
    <link href="{{ asset('libs/file/css/fileinput.min.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/file/themes/explorer/theme.min.css') }}" rel="stylesheet">
@endsection

@section("content")
    <div class="box box-solid box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Registrar Peticion</h3>
        </div>
        <div class="box-body">
            <form id="registrarPeticion" name="registrarPeticion" method="post" action="">

                <div class="row">
                    <div class="col-lg-4 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Ingrese el nombre">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="mail">Correo</label>
                            <input type="email" class="form-control" id="mail" placeholder="Ingrese correo electronico">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="tel">Telefono</label>
                            <input type="tel" class="form-control" id="tel" placeholder="Ingrese telefono">
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="direccion">Direccion</label>
                            <textarea type="text" class="form-control" id="direccion"
                                      placeholder="Ingrese la direccion"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="descripcion">Descripcion</label>
                            <textarea type="text" class="form-control" id="descripcion"
                                      placeholder="Ingrese una breve descripcion"></textarea>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-12">
                        <label for="documento">Seleccione documentos</label>
                        <div class="file-loading">
                            <input id="documento" name="documento[]" type="file" multiple>;
                        </div>
                    </div>
                </div>

                <!-- /.box-body -->

                <div class="box-footer text-center">
                    <button type="submit" class="btn btn-primary">Registrar Peticion</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section("js")
    <script src="{{ asset('libs/file/js/fileinput.min.js') }}"></script>
    <script src="{{ asset('libs/file/themes/explorer/theme.min.js') }}"></script>
    <script src="{{ asset('libs/file/js/locales/es.js') }}"></script>
@endsection


@section("scripts")
    <script type="text/javascript">
        $(function () {
            $("#documento").fileinput({
                theme: "explorer",
                uploadUrl: "/file-upload-batch/2",
                language: "es",
                minFileCount: 1,
                maxFileCount: 3,
                allowedFileExtensions: ['docx', 'pdf'],
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
    </script>
@endsection