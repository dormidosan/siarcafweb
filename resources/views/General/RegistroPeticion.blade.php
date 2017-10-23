@extends('layouts.app')

@section('styles')
    <link href="{{ asset('libs/file/css/fileinput.min.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/file/themes/explorer/theme.min.css') }}" rel="stylesheet">
@endsection

@section("content")
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Registrar Peticion</h3>
        </div>
        <div class="box-body">

            <form id="registrar_peticion" name="registrar_peticion" method="post" action="{{ url('registrar_peticion') }}" enctype="multipart/form-data" >

			{{ csrf_field() }}

                <div class="row">
                    <div class="col-lg-4 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>

                            <input name="nombre" type="text" class="form-control" id="nombre" placeholder="Ingrese el nombre" required>

                        </div>
                    </div>
					
                    <div class="col-lg-4 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="mail">Correo</label>

                            <input name="correo" type="email" class="form-control" id="mail" placeholder="Ingrese correo electronico" required>

                        </div>
                    </div>
					
                    <div class="col-lg-4 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="tel">Telefono</label>

                            <input name="telefono" type="tel" class="form-control" id="tel" placeholder="Ingrese telefono" required>

                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="direccion">Direccion</label>

                            <textarea name="direccion" type="text" class="form-control" id="direccion"
                                      placeholder="Ingrese la direccion" required></textarea>

                        </div>
                    </div>
                </div>
				
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="descripcion">Descripcion</label>

                            <textarea name="descripcion" type="text" class="form-control" id="descripcion"
                                      placeholder="Ingrese una breve descripcion" required></textarea>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">

                      
                        <div class="form-group">
                            <label for="documento">Seleccione documentos</label>
                            <div class="file-loading">

                                <input id="documento" name="documento[]" type="file" multiple  required>

                            </div>

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
    </script>
    
@endsection