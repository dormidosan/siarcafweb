@extends('layouts.app')

@section('styles')
    <link href="{{ asset('libs/file/css/fileinput.min.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/file/themes/explorer/theme.min.css') }}" rel="stylesheet">
@endsection

@section("content")
    <div class="box box-danger box-solid">
        <div class="box-header">
            <h3 class="box-title">Seguimiento</h3>
        </div>
        <div class="box-body">

                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input name="nombre" type="text" class="form-control" id="nombre" value="{{ $peticion->nombre }}" readonly>
                            <label>Fecha inicio</label>
                            <input name="nombre" type="text" class="form-control" id="nombre" value="{{ $peticion->fecha }}" readonly>
                            <label>Fecha Actual</label>
                            <input name="nombre" type="text" class="form-control" id="nombre" value="{{ Carbon\Carbon::now() }}" readonly>
                            <label>Descripcion</label>
                            <input name="nombre" type="text" class="form-control" id="nombre" value="{{ $peticion->descripcion }}" readonly>
                            <label>Peticionario</label>
                            <input name="nombre" type="text" class="form-control" id="nombre" value="{{ $peticion->peticionario }}" readonly>
                            <label>Direccion</label>
                            <input name="nombre" type="text" class="form-control" id="nombre" value="{{ $peticion->direccion }}" readonly>
                            <label>Correo</label>
                            <input name="nombre" type="text" class="form-control" id="nombre" value="{{ $peticion->correo }}" readonly>
                        </div>
                    </div>

                </div>
          
          
            <br>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Documentos asociados</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive table-bordered">
                        <table class="table table-hover text-center">
                            <thead>
                            <tr>
                                <th>Nombre comision</th>
                                <th>Fecha inicio</th>
                                <th>Fecha fin</th>
                                <th>Descripcion</th>
                                <th>Documento</th>
                                <th>Opcion</th>
                            </tr>
                            </thead>
                               <tbody id="cuerpoTabla">

             <!--
                            <tr>
                                <td>Lo he dejado quemado para que</td>
                                <td>no se vea solo :v</td>
                                <td><a href="#" class="btn btn-block btn-success btn-xs">Descargar</a></td>
                                <td>Opcion</td>
                            </tr>
            -->
                          
                        @forelse($peticion->seguimientos as $seguimiento)
                            <tr>
                                    <td>
                                        <center>
                                        {!! $seguimiento->comision->nombre !!}
                                        </center>
                                    </td>
                                    <td>
                                    {!! $seguimiento->inicio !!}
                                    </td>
                                    <td>
                                    {!! $seguimiento->fin !!}
                                    </td>
                                    <td>
                                    {!! $seguimiento->descripcion !!}    
                                    </td>
                                    @if($seguimiento->documento)
                                    <td>
                                        {!! $seguimiento->documento->tipo_documento->tipo !!}    
                                    </td>
                                    <td>
                                        <a class="btn btn-info" href="<?= $disco.$seguimiento->documento->path; ?>" role="button">Ver</a>
                                        <a class="btn btn-success" href="descargar_documento/<?= $seguimiento->documento->id; ?>" role="button">Descargar</a>
                                    </td>
                                    @else
                                    <td>
                                        N/A
                                    </td>
                                    <td>
                                    Sin documento    
                                    </td>
                                    
                                    @endif   
                                    
                                    
                             </tr>

                        @empty
                            <p style="color: red ;">No hay criterios de busqueda</p>
                        @endforelse


                            </tbody>




                        </table>

                    </div>

                </div>
            </div>

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
                hideThumbnailContent: true,
                showPreview: false

            });
        });
    </script>
@endsection