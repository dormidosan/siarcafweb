

@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{ asset('libs/datepicker/css/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('libs/datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('libs/adminLTE/plugins/toogle/css/bootstrap-toggle.min.css') }}">
@endsection
@section("content")
<div class="box box-danger">
   <div class="box-header with-border">
      <h3 class="box-title">Asistencia de Junsta Directiva</h3>
   </div>
   <div class="box-body">
      <div class="row">
         <div class="col-lg-4 col-sm-12 col-lg-offset-2">
            <button type="button" id="iniciar" name="iniciar" class="btn btn-warning btn-block">Peticiones***</button>
         </div>
         <div class="col-lg-4 col-sm-12">
            <button type="button" id="iniciar" name="iniciar" class="btn btn-info btn-block">Asistencia***</button>
         </div>
      </div>
      <br>
      <div class="row">
         <div class="col-lg-4 col-sm-12 col-lg-offset-2">
            <button type="button" id="iniciar" name="iniciar" class="btn btn-success btn-block">Iniciar</button>
         </div>
         <div class="col-lg-4 col-sm-12">
            <button type="button" id="iniciar" name="iniciar" class="btn btn-danger btn-block">Finalizar</button>
         </div>
      </div>
      <br>
      <div class="panel panel-default">
         <div class="panel-heading">
            <h3 class="panel-title">Listado Peticiones</h3>
         </div>
         <div class="panel-body">
            <div class="table-responsive">
               <table class="table text-center">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th>Peticion</th>
                        <th>Descripcion</th>
                        <th>Fecha de creación</th>
                        <th>Fecha actual</th>
                        <th>Peticionario</th>
                        <th>Visto anteriormente por</th>
                        <th>Acción</th>
                     </tr>
                  </thead>
                  <tbody>
                  @php $contador=1 @endphp
                     @forelse($peticiones as $peticion)
                     <tr>
                        <td>
                          {!! $contador !!}
                          @php $contador++ @endphp
                        </td>
                        <td>
                           <center>
                              {!! $peticion->nombre !!}
                           </center>
                        </td>
                        <td>
                           {!! $peticion->descripcion !!}
                        </td>
                        <td>
                           {!! $peticion->fecha !!}
                        </td>
                        <td>
                           {!! Carbon\Carbon::now() !!}
                        </td>
                        <td>
                           {!! $peticion->peticionario !!}
                        </td>
                        <td>
                           {{-- Visto anteriormente por  --}}
                           @php
                           $i = ''
                           @endphp
                           @foreach($peticion->seguimientos as $seguimiento)
                           @if($seguimiento->estado_seguimiento->estado !== 'cr'
                           and $seguimiento->estado_seguimiento->estado !== 'se' 
                           and $seguimiento->estado_seguimiento->estado !== 'as') 
                           @php 
                           $i = $seguimiento->comision->nombre
                           @endphp
                           @endif
                           @endforeach
                           {!! $i !!}
                        </td>
                        <td>
                           <!--
                              <a class="btn btn-info" href="#" role="button">Ver</a> 
                              -->
                           {!! Form::open(['route'=>['seguimiento_peticion_jd'],'method'=> 'POST']) !!}
                           {{ Form::hidden('id_peticion', $peticion->id) }}
                           <input type="submit" class="btn btn-info" name="Guardar" value="Ver">
                           {!! Form::close() !!}
                        </td>
                        <td>
                           {!! Form::open(['route'=>['asignar_comision_jd'],'method'=> 'POST']) !!}
                           {{ Form::hidden('id_peticion', $peticion->id) }}
                           <input type="submit" class="btn btn-success" name="Guardar" value="Asignar">
                           {!! Form::close() !!}
                        </td>
                        <td>
                           {!! Form::open(['route'=>['asignar_comision_jd'],'method'=> 'POST']) !!}
                           {{ Form::hidden('id_peticion', $peticion->id) }}
                           <input type="submit" class="btn btn-success" name="Guardar" value="Subir atestado">
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
@endsection
@section("js")
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
</script>
@endsection

