@extends('layouts.app')

@section('breadcrumb')
    <section class="">
        <ol class="breadcrumb">
            <li><a href="{{ route("inicio") }}"><i class="fa fa-home"></i> Inicio</a></li>
        </ol>
    </section>
@endsection

@section("content")
    <div class="box box-danger">
        <div class="box-header">
            <h3 class="box-title">Listado de Puntos</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-lg-4 col-lg-offset-1 col-sm-12">
                    {!! Form::open(['route'=>['sala_sesion_plenaria'],'method'=> 'POST']) !!} 
                    <input type="hidden" name="id_agenda" id="id_agenda" value="{{$agenda->id}}">                   
                    <button type="submit" id="iniciar" name="iniciar" class="btn btn-danger btn-block"> Regresar a - Asistencia plenaria</a>                  
                    {!! Form::close() !!}    
                </div>
                <div class="col-lg-4 col-lg-offset-1 col-sm-12">
                    {!! Form::open(['route'=>['finalizar_sesion_plenaria'],'method'=> 'POST']) !!} 
                    <input type="hidden" name="id_agenda" id="id_agenda" value="{{$agenda->id}}">   
                              
                    <button type="submit" id="iniciar" name="iniciar" class="btn btn-danger btn-block" disabled="disabled">Finalizar plenaria</a>                  
                    {!! Form::close() !!}    
                </div>

                <div class="col-lg-4 col-lg-offset-1 col-sm-12">
                    {!! Form::open(['route'=>['fijar_puntos'],'method'=> 'POST']) !!} 
                    <input type="hidden" name="id_agenda" id="id_agenda" value="{{$agenda->id}}">    
                        @if($agenda->fijada == 1)
                            <button type="submit" id="iniciar" name="iniciar" class="btn btn-success btn-block" disabled="disabled">Fijar puntos</a>   
                        @else
                            <button type="submit" id="iniciar" name="iniciar" class="btn btn-success btn-block">Fijar puntos</a>   
                        @endif               
                                   
                    {!! Form::close() !!}    
                </div>
                <div class="col-lg-4 col-lg-offset-1 col-sm-12">
                    <!-- {-!-! Form::open(['route'=>['seguimiento_peticion_plenaria'],'method'=> 'POST','target' => '_blank']) !!} -->
                    <!-- Al pausar sesion plenaria , regresara a la pantalla con el listado de todas las sesiones plenarias, 
                    usar la pantalla de jonathan de consultar agenda vigente como ejemplo-->
                    {!! Form::open(['route'=>['pausar_sesion_plenaria'],'method'=> 'POST']) !!} 
                    <input type="hidden" name="id_agenda" id="id_agenda" value="{{$agenda->id}}">   
                              
                    <button type="submit" id="iniciar" name="iniciar" class="btn btn-warning btn-block" >Pausar plenaria</a>                  
                    {!! Form::close() !!}                  
                    <!-- {-!-! Form::close() !!}    -->
                </div>

             
            </div>
   </div>

        <div class="box-body">
            <div class="table-responsive">
                <table class="table text-center table-bordered hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Romano</th>
                        <th>Descripcion</th>
                        <th>Peticionario</th>
                        <th>Fecha peticion</th>
                        <th>Retirado</th>
                        <th colspan="2">Accion</th>
                    </tr>
                    </thead>
                    <tbody id="cuerpoTabla">
                    @php 
                    $contador =1
                    @endphp 
                    @forelse($puntos as $punto)
                        
                        @if ($punto->id == $actualizado)
                            <tr class="success">
                        @else
                            <tr>
                        @endif
                            <td>
                                {!! $contador !!} @php $contador++ @endphp
                            </td>
                            <td>{!! $punto->romano !!}</td>
                            <td>{!! $punto->descripcion !!}</td>
                            @if($punto->peticion_id)
                                <td>{!! $punto->peticion->peticionario !!}</td>
                                <td>{!! $punto->peticion->fecha !!}</td>
                                <td>{!! $punto->retirado !!}</td>
                                <td>
                                    {!! Form::open(['route'=>['seguimiento_peticion_plenaria'],'method'=> 'POST']) !!}
                                    <input type="hidden" name="id_punto" id="id_punto" value="{{$punto->id}}"> 
                                    <input type="hidden" name="id_agenda" id="id_agenda" value="{{$agenda->id}}">
                                    <input type="hidden" name="regresar" id="regresar" value="l">          
                                    <button type="submit" class="btn btn-primary btn-xs btn-block" >
                                    <i class="fa fa-eye"></i> Informacion
                                    </button>
                                    {!! Form::close() !!}
                                </td>
                                
                                    @if($agenda->fijada == 0)
                                        <td>
                                        {!! Form::open(['route'=>['nuevo_orden_plenaria'],'method'=> 'POST','id'=>$punto->id.'2']) !!}
                                            <input type="hidden" name="id_agenda"   id="id_agenda"   value="{{$agenda->id}}">
                                            <input type="hidden" name="id_punto"    id="id_punto"    value="{{$punto->id}}">
                                            <input type="hidden" name="restar"  id="restar"  value="1">
                                            <button type="submit" class="btn btn-success" >Subir</button>        
                                            {!! Form::close() !!}

                                            {!! Form::open(['route'=>['nuevo_orden_plenaria'],'method'=> 'POST','id'=>$punto->id.'1']) !!}
                                            <input type="hidden" name="id_agenda"   id="id_agenda"   value="{{$agenda->id}}">
                                            <input type="hidden" name="id_punto"    id="id_punto"    value="{{$punto->id}}">
                                            <input type="hidden" name="restar"  id="restar"  value="0">                                      
                                            <button type="submit" class="btn btn-danger">Bajar</button>                                                                                
                                            {!! Form::close() !!}
                                        </td>
                                    @else
                                        @if($punto->activo == 1)                               
                                        <td>
                                            {!! Form::open(['route'=>['discutir_punto_plenaria'],'method'=> 'POST']) !!}
                                            <input type="hidden" name="id_punto" id="id_punto" value="{{$punto->id}}">
                                            <input type="hidden" name="id_agenda" id="id_agenda" value="{{$agenda->id}}">
                                            <button type="submit" class="btn btn-success btn-xs btn-block">
                                            <i class="fa fa-eye"></i>Discutir
                                            </button>
                                            {!! Form::close() !!}
                                        </td>
                                        @else                               
                                        <td>
                                            <button type="submit" class="btn btn-success btn-xs btn-block" disabled="disabled">
                                            <i class="fa fa-eye"></i> Discutir
                                            </button>
                                        </td>
                                        @endif
                                    @endif
                                @else
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>                                                               
                                    <td></td>                          
                                    <td></td>
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
@endsection

