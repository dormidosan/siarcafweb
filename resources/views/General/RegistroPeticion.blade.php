@extends('layouts.app')

@section('styles')
    <link href="{{ asset('libs/file/css/fileinput.min.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/file/themes/explorer/theme.min.css') }}" rel="stylesheet">
@endsection

@section('breadcrumb')
    <section>
        <ol class="breadcrumb">
            <li><a href="{{ route("inicio") }}"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a>Peticiones</a></li>
            <li><a class="active">Registrar Peticiones</a></li>
        </ol>
    </section>
@endsection

@section("content")
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Registrar Peticion</h3>
        </div>
        <div class="box-body">

            @if( !$peticion )
        <form id="registrar_peticion" name="registrar_peticion" method="post" action="{{ url('registrar_peticion') }}" enctype="multipart/form-data" >

            {{ csrf_field() }}

                <div class="row">
                  
                    
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
                    
                    <div class="col-lg-4 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="mail">Peticionario</label>

                            <input name="peticionario" type="text" class="form-control" id="peticionario" placeholder="Ingrese el peticionario" required>

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
                            <label for="documento">Seleccione peticion (1)</label>
                            <div class="file-loading">

                                <input id="documento_peticion" name="documento_peticion" type="file"   required>

                            </div>

                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-lg-12">

                      
                        <div class="form-group">
                            <label for="documento">Seleccione atestados (1-3)</label>
                            <div class="file-loading">

                                <input id="documento_atestado" name="documento_atestado[]" type="file" multiple  required>

                            </div>

                        </div>
                    </div>
                </div>

                <!-- /.box-body -->

                <div class="box-footer text-center">
                    <button type="submit" class="btn btn-primary">Registrar Peticion</button>
                </div>
            </form>

            @else 

            <form id="registrar_peticion_response" name="registrar_peticion_response" method="post" action="#" enctype="multipart/form-data" >

            {{ csrf_field() }}

                <div class="row">

                    <div class="col-lg-4 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="codigo">Codigo de seguimiento</label>
                            <input name="codigo" type="text" class="form-control" id="codigo" value="{{ $peticion->codigo }}" readonly style="color: #000000; font-family: Verdana; font-weight: bold; font-size: 12px; background-color: #95C9A3;" >
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="nada"></label>
                        
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="boton_regresar"></label>
                            <a class="btn btn-danger" href="{{ url('/RegistrarPeticion') }}" role="button">Crear nueva peticion</a>
                        
                        </div>
                    </div>



                </div>
                <div class="row">
                    
                    
                    <div class="col-lg-4 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="mail">Correo</label>
                            <input name="correo" type="email" class="form-control" id="mail" value="{{ $peticion->correo }}" readonly>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="tel">Telefono</label>
                            <input name="telefono" type="tel" class="form-control" id="tel" value="{{ $peticion->telefono }}" readonly>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="mail">Peticionario</label>
                            <input name="peticionario" type="text" class="form-control" id="peticionario" value="{{ $peticion->peticionario }}" readonly>
                        </div>
                    </div>
               

                </div>

                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="direccion">Direccion</label>
                            <textarea name="direccion" type="text" class="form-control" id="direccion"
                                       readonly>{{ $peticion->direccion }}</textarea>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="descripcion">Descripcion</label>
                            <textarea name="descripcion" type="text" class="form-control" id="descripcion"
                                       readonly>{{ $peticion->descripcion }}</textarea>
                        </div>
                    </div>
                </div>

                <table id="resultadoDocs"
                   class="table table-striped table-bordered table-condensed table-hover dataTable text-center">
                <thead>
                <tr>
                    <th>Nombre Documento</th>
                    <th>Tipo de Documento</th>
                    <th>Fecha Creacion</th>
                    <th>Visualizar</th>
                    <th>Descargar</th>
                </tr>
                </thead>

                <tbody id="cuerpoTabla">


            @forelse($peticion->documentos as $documento)
                <tr>
                        <td>
                            <center>
                            {!! $documento->nombre_documento !!}
                            </center>
                        </td>
                        <td>
                        {!! $documento->tipo_documento->tipo !!}
                        </td>
                        <td>
                        {!! $documento->fecha_ingreso !!}
                        </td>
                        <td>
                            <a class="btn btn-info" href="<?= $disco.$documento->path; ?>" role="button">Ver</a>
                        </td>
                        <td>
                            <a class="btn btn-success" href="descargar_documento/<?= $documento->id; ?>" role="button">Descargar</a>
                        </td>
                 </tr>


            @empty
                <p style="color: red ;">No hay criterios de busqueda</p>
            @endforelse


                </tbody>

            </table>

                <!-- /.box-body -->

                
            </form>

            @endif
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
            $("#documento_peticion").fileinput({
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

         $(function () {
            $("#documento_atestado").fileinput({
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