@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('') }}">
@endsection

@section("content")
   <div class="box box-danger box-solid">
       <div class="box-header">
           <h3 class="box-title">Puntos de Comision</h3>
       </div>
       <div class="box-body">
           <div class="table-responsive">
               <table class="table text-center table-bordered hover">
                   <thead>
                   <tr>
                       <th>Peticion</th>
                       <th>Descripcion</th>
                       <th>Fecha de creación</th>
                       <th>Fecha actual</th>
                       <th>Peticionario</th>
                       <th>Ultima asignacion</th>
                       <th>Visto anteriormente por</th>
                       <th>Acción</th>
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
              
            @forelse($peticiones as $peticion)
            {!! Form::open(['route'=>['seguimiento_peticion_jd'],'method'=> 'POST']) !!}

                <tr>
                {{ Form::hidden('id_peticion', $peticion->id) }}
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
                        @php
                        $i = ''
                        @endphp
                        @foreach($peticion->seguimientos as $seguimiento)
                         @if($seguimiento->estado_seguimiento_id == 7) 
                              @php 
                              $i = $seguimiento->comision->nombre
                              @endphp
                        @endif
                        @endforeach
                        {!! $i !!}
                        </td>
                        <td>
                        @php
                        $i = ''
                        @endphp
                        @foreach($peticion->seguimientos as $seguimiento)
                         @if($seguimiento->estado_seguimiento_id !== 1 and $seguimiento->estado_seguimiento_id !== 2) 
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
                             <input type="submit" class="btn btn-info" name="Guardar" value="Ver">
                        </td>
                        
                 </tr>

            {!! Form::close() !!}
            @empty
                <p style="color: red ;">No hay criterios de busqueda</p>
            @endforelse


                </tbody>
               </table>
           </div>
       </div>
   </div>
@endsection

@section("js")
    <script src="{{ asset('') }}"></script>
@endsection


@section("scripts")
    <script type="text/javascript">
        $(function () {});
    </script>
@endsection