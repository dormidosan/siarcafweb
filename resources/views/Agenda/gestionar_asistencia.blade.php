@extends('layouts.app')

@section("styles")
    <link rel="stylesheet" href="{{ asset('libs/adminLTE/plugins/icheck/skins/square/green.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/adminLTE/plugins/toogle/css/bootstrap-toggle.min.css') }}">
@endsection

@section('content')
    <div class="box box-solid box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Facultad de Ciencias Agronómicas</h3>
        </div>

        <div class="box-body">
            <div class="panel panel-success">
                <!-- Default panel contents -->
                <div class="panel-heading">Control de Permisos y Asisntencia</div>

                <div class="table-responsive">
                    <table id="listadoAsambleista" class="table text-center">
                        <thead>
                        <tr>
                            <th>Asambleista</th>
                            <th>Cargo</th>
                            <th>Sector</th>

                            <th>Hora de entrada</th>
                            <th>Cambiar a</th>
                            <!--
                            <th>Presente</th>
                            <th>Propietaria</th>
                            <th>Permiso Temporal</th>
                            <th>Observación/Motivo</th>
                            -->
                        </tr>
                        </thead>
                        <tbody id="cuerpoTabla" class="text-center">
                        
                        @forelse($asambleistas as $asambleista)
                        <tr>
                            <td>{{$asambleista->user->persona->primer_nombre." ".$asambleista->user->persona->primer_apellido}}</td>
                            <td>{{$asambleista->propietario}}</td>
                            <td>{{$asambleista->sector->nombre}}</td>
                            <td>
                            @php $hora_entrada=0 @endphp
                            @php $propietaria_plenaria=0 @endphp
                            <!-- INCIAR - IMPRIMIR LA HORA DE ENTRADA Y SALIDA DE ESTE ASAMBLEISTA EN ESTA SESION -->
                            @forelse($asistentes as $asistente)
                                @if($asambleista->id == $asistente->asambleista_id)
                                    {{$asistente->entrada}} - 
                                    {{$asistente->salida}} - 
                                    @if($asistente->propietario == 1)
                                    Propietario
                                    @php $propietaria_plenaria=1 @endphp
                                    @else
                                    Suplente
                                    @php $propietaria_plenaria=2 @endphp
                                    @endif

                                    <br>
                                    <!-- TIENE AL MENOS UN REGISTRO DE ASISTENCIA ASI QUE hora_entrada = 1 -->
                                    @php $hora_entrada=1 @endphp
                                @endif

                            @empty
                            
                            <!--
                            <td>1</td>
                            <td>1</td>
                            <td >
                                <ul class="fa-ul" >
                                    <li><i class="fa-li fa fa-check-square fa-lg s">-marcar</i></li>
                                </ul>
                            </td>
                            <td>1-->
                            @endforelse
                            <!-- TERMINA - LA HORA DE ENTRADA Y SALIDA DE ESTE ASAMBLEISTA EN ESTA SESION -->

                            <!-- EVALUAR SI AL MENOS EXISTE UN REGISTRO DE ASISTENCIA PARA ESTE ASAMBLEISTA -->                            
                            @if($hora_entrada == 0)
                                No presente
                            @endif
                            </td>
                            <!-- SI TIENE HORA DE ENTRADA , HACER ESTO -->   
                            @if($hora_entrada == 0)
                                <td></td>
                            @else
                                <td>
                                


                                    @if($propietaria_plenaria == 1)
                                    <button type="submit" class="btn btn-primary" >Suplente</button>
                                    @endif
                                    @if($propietaria_plenaria == 2)
                                        @if($asambleista->sector_id == 1)
                                        <button type="submit" class="btn btn-primary" >Propietario</button>
                                        @endif

                                        @if($asambleista->sector_id == 2)
                                        <button type="submit" class="btn btn-primary" >Propietario</button>
                                        @endif

                                        @if($asambleista->sector_id == 3)
                                        <button type="submit" class="btn btn-primary" >Propietario</button>
                                        @endif
                                    
                                    @endif
                                    
                                    
                                </td>
                            @endif


                        </tr>
                        @empty

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
@endsection
@section("script")
@endsection