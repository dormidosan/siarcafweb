

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
                <div class="col-lg-4 col-lg-offset-1 col-sm-12">
                    {!! Form::open(['route'=>['iniciar_sesion_plenaria'],'method'=> 'POST']) !!} 
                    <input type="hidden" name="id_agenda" id="id_agenda" value="{{$agenda->id}}">                   
                    <button type="submit" id="iniciar" name="iniciar" class="btn btn-danger btn-block">Retirado</a>                  
                    {!! Form::close() !!}    
                </div>
                <div class="col-lg-4 col-lg-offset-1 col-sm-12">
                    {!! Form::open(['route'=>['iniciar_sesion_plenaria'],'method'=> 'POST']) !!} 
                    <input type="hidden" name="id_agenda" id="id_agenda" value="{{$agenda->id}}">                   
                    <button type="submit" id="iniciar" name="iniciar" class="btn btn-success btn-block">Resuelto</a>                  
                    {!! Form::close() !!}    
                </div>
                <div class="col-lg-4 col-lg-offset-1 col-sm-12">
                    {!! Form::open(['route'=>['iniciar_sesion_plenaria'],'method'=> 'POST']) !!} 
                    <input type="hidden" name="id_agenda" id="id_agenda" value="{{$agenda->id}}">                   
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
      <div class="panel panel-default">
         <div class="panel-heading">
            <h3 class="panel-title">Propuestas</h3>
         </div>
         <div class="panel-body">
            <div class="table-responsive">
               <table class="table table-hover text-center">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th>Nombre propuesta</th>
                        <th>favor</th>
                        <th>contra</th>
                        <th>abstencion</th>
                        <th>nulos</th>
                        <th>ronda</th>
                        <th>activa</th>
                        <th>accion</th>
                     </tr>
                  </thead>
                  <tbody id="cuerpoTabla" class="text-center">
                  @php $contador = 1 @endphp
                     @forelse($propuestas as $propuesta)
                      @if($propuesta->votado == 1)
                      <tr>
                        <td>
                          {!! $contador !!}
                          @php $contador++ @endphp
                        </td>
                        <td>
                        {{ $propuesta->nombre_propuesta }}
                        </td>
                        <td>
                        {{ $propuesta->favor }}
                        </td>
                        <td>
                        {{ $propuesta->contra }}
                        </td>
                        <td>
                        {{ $propuesta->abstencion }}
                        </td>
                        <td>
                        {{ $propuesta->nulo }}
                        </td>
                        <td>{{ $propuesta->ronda }}</td>
                        <td>{{ $propuesta->activa }}</td>
                        <td>
                          @if($propuesta->ronda == 1 and $propuesta->activa == 1)
                            {!! Form::open(['route'=>['modificar_propuesta'],'method'=> 'POST']) !!}   
                              <input type="hidden" name="id_propuesta" id="id_propuesta" value="{{$propuesta->id}}">
                              <input type="hidden" name="id_agenda" id="id_agenda" value="{{$agenda->id}}"> 
                              <input type="hidden" name="id_punto" id="id_punto" value="{{$punto->id}}"> 
                              <input type="hidden" name="opcion" id="opcion" value="1">     
                              <button type="submit" id="iniciar" name="iniciar" class="btn btn-warning btn-block">Ronda 2</button>    
                            {!! Form::close() !!}
                          @endif
                        </td>
                        <td>
                          
                        </td>
                      </tr>
                      @else
                      <tr>
                        {!! Form::open(['route'=>['guardar_votacion'],'method'=> 'POST']) !!}   
                        <td>
                          {!! $contador !!}
                          @php $contador++ @endphp
                        </td>
                        <td>
                        {{ $propuesta->nombre_propuesta }}
                        </td>
                        <td>
                        <input type="text" class="form-control" id="favor" name="favor" value="0">
                        </td>
                        <td>
                        <input type="text" class="form-control" id="contra" name="contra" value="0">
                        </td>
                        <td>
                        <input type="text" class="form-control" id="abstencion" name="abstencion" value="0">
                        </td>
                        <td>
                        <input type="text" class="form-control" id="nulo" name="nulo" value="0">
                        </td>
                        <td>{{ $propuesta->ronda }}</td>
                        <td>{{ $propuesta->activa }}</td>
                        <td>
                          <input type="hidden" name="id_propuesta" id="id_propuesta" value="{{$propuesta->id}}">
                          <input type="hidden" name="id_agenda" id="id_agenda" value="{{$agenda->id}}"> 
                          <input type="hidden" name="id_punto" id="id_punto" value="{{$punto->id}}">  
                          <button type="submit" id="iniciar" name="iniciar" class="btn btn-success btn-block">Guardar</button>    
                        </td>
                        {!! Form::close() !!}
                        <td>
                          {!! Form::open(['route'=>['modificar_propuesta'],'method'=> 'POST']) !!}   
                          <input type="hidden" name="id_propuesta" id="id_propuesta" value="{{$propuesta->id}}">
                          <input type="hidden" name="id_agenda" id="id_agenda" value="{{$agenda->id}}"> 
                          <input type="hidden" name="id_punto" id="id_punto" value="{{$punto->id}}"> 
                          <input type="hidden" name="opcion" id="opcion" value="2">     
                          <button type="submit" id="iniciar" name="iniciar" class="btn btn-danger btn-block">Retirar</button>    
                        {!! Form::close() !!}
                        </td>
                      </tr>

                      @endif
                     @empty
                     <p style="color: red ;">No hay criterios de busqueda</p>
                     @endforelse
                     <tr>
                        {!! Form::open(['route'=>['agregar_propuesta'],'method'=> 'POST']) !!}   
                        <td>
                          <input type="text" class="form-control" name="nueva_propuesta"  id="nueva_propuesta" placeholder="Digite nueva propuesta">
                          <input type="hidden" name="id_agenda" id="id_agenda" value="{{$agenda->id}}"> 
                          <input type="hidden" name="id_punto" id="id_punto" value="{{$punto->id}}"> 
                        </td>
                        <td>               
                            <button type="submit" id="iniciar" name="iniciar" class="btn btn-success btn-block">Agregar propuesta</button>    
                        </td>
                        {!! Form::close() !!}
                     </tr>
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

