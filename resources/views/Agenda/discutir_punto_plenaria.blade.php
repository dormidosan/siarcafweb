

@extends('layouts.app')
@section('styles')
<link href="{{ asset('libs/file/css/fileinput.min.css') }}" rel="stylesheet">
<link href="{{ asset('libs/file/themes/explorer/theme.min.css') }}" rel="stylesheet">
@endsection
@section("content")
<div class="box box-danger">
   <div class="box-header">
      <h3 class="box-title">Discucion Punto</h3>
   </div>
   <div class="box-body">
            <div class="row">
                <div class="col-lg-4 col-lg-offset-1 col-sm-12">
                    {!! Form::open(['route'=>['iniciar_sesion_plenaria'],'method'=> 'POST']) !!} 
                    <input type="hidden" name="id_agenda" id="id_agenda" value="{{$agenda->id}}">                   
                    <button type="submit" id="iniciar" name="iniciar" class="btn btn-danger btn-block">Regresar a - Sesion plenaria</a>                  
                    {!! Form::close() !!}    
                </div>
                @if($punto->activo == 1)
                <div class="col-lg-4 col-lg-offset-1 col-sm-12">
                    {!! Form::open(['route'=>['retirar_punto_plenaria'],'method'=> 'POST']) !!} 
                    <input type="hidden" name="id_agenda" id="id_agenda" value="{{$agenda->id}}">   
                    <input type="hidden" name="id_punto" id="id_punto" value="{{$punto->id}}">                    
                    <button type="submit" id="iniciar" name="iniciar" class="btn btn-danger btn-block">Retirar punto</a>                  
                    {!! Form::close() !!}    
                </div>                
                <div class="col-lg-4 col-lg-offset-1 col-sm-12">
                    {!! Form::open(['route'=>['resolver_punto_plenaria'],'method'=> 'POST']) !!} 
                    <input type="hidden" name="id_agenda" id="id_agenda" value="{{$agenda->id}}">     
                    <input type="hidden" name="id_punto" id="id_punto" value="{{$punto->id}}">                  
                    <button type="submit" id="iniciar" name="iniciar" class="btn btn-success btn-block">Resolver punto</a>                  
                    {!! Form::close() !!}    
                </div>     
                @endif           
                <div class="col-lg-4 col-lg-offset-1 col-sm-12">
                    {!! Form::open(['route'=>['comision_punto_plenaria'],'method'=> 'POST','target' => '_blank']) !!} 
                    <input type="hidden" name="id_agenda" id="id_agenda" value="{{$agenda->id}}">
                    <input type="hidden" name="id_punto" id="id_punto" value="{{$punto->id}}">           
                    <button type="submit" id="iniciar" name="iniciar" class="btn btn-info btn-block">Enviar a comision</a>                  
                    {!! Form::close() !!}    
                </div>
                <div class="col-lg-4 col-lg-offset-1 col-sm-12">
                    {!! Form::open(['route'=>['seguimiento_peticion_plenaria'],'method'=> 'POST','target' => '_blank']) !!} 
                    <input type="hidden" name="id_agenda" id="id_agenda" value="{{$agenda->id}}">
                    <input type="hidden" name="id_punto" id="id_punto" value="{{$punto->id}}">     
                    <input type="hidden" name="regresar" id="regresar" value="d">                   
                    <button type="submit" id="iniciar" name="iniciar" class="btn btn-info btn-block">Historial seguimiento</a>                  
                    {!! Form::close() !!}    
                </div>
             
            </div>
   </div>
   <div class="box-body">
      <div class="row">
         <div class="col-lg-4 col-sm-12 col-md-4">
            <div class="form-group">
               <label>Fecha inicio</label>
               <input name="nombre" type="text" class="form-control" id="nombre" value="{{ $punto->peticion->fecha }}"
                  readonly>
            </div>
         </div>
         <div class="col-lg-4 col-sm-12 col-md-4">
            <div class="form-group">
               <label>Fecha Actual</label>
               <input name="nombre" type="text" class="form-control" id="nombre"
                  value="{{ Carbon\Carbon::now() }}" readonly>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-4 col-sm-12 col-md-4">
            <div class="form-group">
               <label>Peticionario</label>
               <input name="nombre" type="text" class="form-control" id="nombre"
                  value="{{ $punto->peticion->peticionario }}" readonly>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-12 col-sm-12 col-md-4">
            <div class="form-group">
               <label>Descripcion</label>
               <textarea class="form-control" readonly>{{ $punto->peticion->descripcion }}</textarea>
            </div>
         </div>
      </div>
      @if($punto->activo == 1)
        @include('Agenda.propuestas')
        @include('Agenda.intervenciones')
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

