@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('libs/datepicker/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset('libs/adminLTE/plugins/toogle/css/bootstrap-toggle.min.css') }}">
@endsection

@section("content")
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Reunion de Junta Directiva</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-lg-4 col-lg-offset-3 col-sm-12">
                    {!! Form::open(['route'=>['listado_sesion_plenaria'],'method'=> 'POST']) !!} 
                    {{ Form::hidden('id_reunion', $reunion->id) }} {{ Form::hidden('id_comision', $comision->id) }}
                   
                    <button type="submit" id="iniciar" name="iniciar" class="btn btn-danger btn-block">Regresar a - Listado de Sesion Plenaria</button>
                  
                    {!! Form::close() !!}    
                    </div>

             
            </div>
            <br>
            <br>
            
        <div class="row">
            <!--
            -<-?-p-hp $-t-odos_puntos=1; ?>
                <div class="col-lg-4 col-sm-12 col-lg-offset-2">
                    <button type="button" id="iniciar" name="iniciar" class="btn btn-success btn-block">Iniciar</button>
                </div>
--> 
            <div class="col-lg-4 col-lg-offset-1 col-sm-12">
            {!! Form::open(['route'=>['agregar_puntos_jd'],'method'=> 'POST']) !!} {{ Form::hidden('id_reunion', $reunion->id) }} {{ Form::hidden('id_comision', $comision->id) }}
                <input type="hidden" name="id_agenda"   id="id_agenda"   value="{{$agenda->id}}">
                <button type="submit" id="iniciar" name="iniciar" class="btn btn-info btn-block"  >Agregar puntos</button>
         
            {!! Form::close() !!}
            </div>
             
            
            
            <div class="col-lg-4 col-lg-offset-2 col-sm-12">
            {!! Form::open(['route'=>['ordenar_puntos_jd'],'method'=> 'POST']) !!} {{ Form::hidden('id_reunion', $reunion->id) }} {{ Form::hidden('id_comision', $comision->id) }}
            <input type="hidden" name="id_agenda"   id="id_agenda"   value="{{$agenda->id}}">
            <button type="submit" id="iniciar" name="iniciar" class="btn btn-default btn-block" disabled="disabled">Ordenar puntos</button>
       
            {!! Form::close() !!}    
            </div>

            
            
        </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Listado Puntos</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                    
                        <table class="table text-center table-striped table-bordered table-hover table-condensed">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Romano</th>
                                <th>Peticionario</th>
                                <th>Descripcion</th>
                                <th>Fecha peticion</th>
                                <th>Fecha actual</th>
                                <th>Visto anteriormente por</th>
                                <th>Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php 
                                $contador=1; 
                                $ultimo = $puntos->last();
                            @endphp 
                            @forelse($puntos as $punto) 
                            @if ($punto->id == $actualizado)
                                <tr class="success">
                            @else
                                <tr>
                            @endif
                         
                                    <td>{!! $contador !!} @php $contador++ @endphp</td>
                                    <td>{!! $punto->romano !!} {!! $punto->numero !!}</td>
                                    <td>{!! $punto->peticion->peticionario !!}</td>
                                    <td>{!! $punto->descripcion !!}</td>
                                    <td>{!! $punto->peticion->fecha !!}</td>
                                    <td>{!! Carbon\Carbon::now() !!}</td>
                                    <td>
                                        {{-- Visto anteriormente por --}} @php $i = '' @endphp @foreach($punto->peticion->seguimientos as $seguimiento) @if($seguimiento->estado_seguimiento->estado !== 'cr' and $seguimiento->estado_seguimiento->estado !== 'se' and $seguimiento->estado_seguimiento->estado !== 'as') @php $i = $seguimiento->comision->nombre @endphp @endif @endforeach {!! $i !!}
                                    </td>
                                    <td>
                                
                                    <td>
                                      
                                    </td>

                                    <td>
                             
                                    </td>

                                    <td>
                                        {!! Form::open(['route'=>['nuevo_orden'],'method'=> 'POST','id'=>$punto->id.'2']) !!}
                                        <input type="hidden" name="id_agenda"   id="id_agenda"   value="{{$agenda->id}}">
                                        <input type="hidden" name="id_punto"    id="id_punto"    value="{{$punto->id}}">
                                        <input type="hidden" name="id_comision" id="id_comision" value="{{$comision->id}}">
                                        <input type="hidden" name="id_reunion"  id="id_reunion"  value="{{$reunion->id}}">
                                        <input type="hidden" name="restar"  id="restar"  value="1">
                                        @if($punto->numero == 1)
                                            <button type="submit" class="btn btn-default" disabled="disabled">Subir</button>
                                        @else
                                            <button type="submit" class="btn btn-success" >Subir</button>        
                                        @endif
                                        {!! Form::close() !!}
                                    
                                        

                                        {!! Form::open(['route'=>['nuevo_orden'],'method'=> 'POST','id'=>$punto->id.'1']) !!}
                                        <input type="hidden" name="id_agenda"   id="id_agenda"   value="{{$agenda->id}}">
                                        <input type="hidden" name="id_punto"    id="id_punto"    value="{{$punto->id}}">
                                        <input type="hidden" name="id_comision" id="id_comision" value="{{$comision->id}}">
                                        <input type="hidden" name="id_reunion"  id="id_reunion"  value="{{$reunion->id}}">
                                        <input type="hidden" name="restar"  id="restar"  value="0">
                                        @if($ultimo == $punto)
                                            <button type="submit" class="btn btn-default" disabled="disabled">Bajar</button>
                                        @else
                                            <button type="submit" class="btn btn-danger">Bajar</button>

                                        @endif
                                        
                                        
                                        {!! Form::close() !!}
                                    </td>
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

@endsection @section("js")
    <script src="{{ asset('libs/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('libs/datepicker/locales/bootstrap-datepicker.es.min.js') }}"></script>
    <script src="{{ asset('libs/datetimepicker/js/moment.min.js') }}"></script>
    <script src="{{ asset('libs/datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('libs/adminLTE/plugins/toogle/js/bootstrap-toggle.min.js') }}"></script>
@endsection

@section("scripts")
    <script type="text/javascript">
        $(function () {
            $('.input-group.date.fecha').datepicker({
                format: "dd/mm/yyyy",
                clearBtn: true,
                language: "es",
                autoclose: true,
                todayHighlight: true,
                toggleActive: true
            });

            $('.toogle').bootstrapToggle({
                on: 'Presente',
                off: 'Ausente'
            });
        });


        function cambiar_estado_peticion(id) {
            $.ajax({
                //se envia un token, como medida de seguridad ante posibles ataques
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                type: 'POST',
                url: "{{ route('actualizar_comision') }}",
                data: {
                    "id": id
                },
                success: function (response) {
                    notificacion(response.mensaje.titulo, response.mensaje.contenido, response.mensaje.tipo);
                }
            });
        }
    </script>
@endsection