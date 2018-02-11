@extends('layouts.app')

@section('styles')
    <link href="{{ asset('libs/file/css/fileinput.min.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/file/themes/explorer/theme.min.css') }}" rel="stylesheet">
@endsection

@section("content")
    <div class="box box-danger">
        <div class="box-header">
            <h3 class="box-title">Subir documento</h3>
        </div>
        <div class="box-body">
            <div class="row">

            <form class="form-group" id="guardar_acta_plenaria" name="guardar_acta_plenaria" method="post" action="{{ url('guardar_acta_plenaria') }}" enctype="multipart/form-data">
            {{ csrf_field() }} 
            <input type="hidden" name="id_agenda" id="id_agenda" value="{{$agenda->id}}">
            <div class="row">
                
                <div class="col-lg-6 col-sm-6 col-md-6">
                    <div class="form-group">
                            <label for="documento">Seleccione acta plenaria (1)</label>
                            <div class="file-loading">

                                <input id="documento_jd" name="documento_jd" type="file"   required="required" data-show-preview="false"  accept=".doc, .docx, .pdf">
                            </div>

                        </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label></label>
                        <input type="submit" class="btn btn-success" name="guardar" id="guardar" value="guardar">
                    </div>
                </div>
            </div>
        </form>
                

                


            </div>
        </div>
        <br>
        
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Seguimiento paso a paso</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover text-center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre documento</th>
                                <th>Tipo documento</th>
                                <th>Fecha ingreso</th>
                                <th>Opcion</th>
                            </tr>
                            </thead>
                            <tbody id="cuerpoTabla" class="text-center">
                            @php $contador = 1 @endphp
                            @forelse($agenda->documentos as $documento)
                                @if($documento->tipo_documento_id == 5)
                                    <tr>
                                    <td>
                                        {!! $contador !!}
                                        @php $contador++ @endphp
                                    </td>
                                    <td>{{$documento->nombre_documento}}</td>
                                    <td>{{$documento->tipo_documento->tipo}}</td>
                                    <td>{{$documento->fecha_ingreso}}</td>
                                    <td>
                                            <a class="btn btn-info btn-xs"
                                               href="{{ asset($disco.''.$documento->path) }}"
                                               role="button" target="_blank ">Ver</a>
                                            <a class="btn btn-success btn-xs"
                                               href="descargar_documento/<?= $documento->id; ?>"
                                               role="button">Descargar</a>
                                    </td>
                                    
                                    </tr>
                                @endif
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
            $("#documento_jd").fileinput({
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