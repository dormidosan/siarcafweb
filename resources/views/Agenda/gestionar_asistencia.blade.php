@extends('layouts.app')

@section("styles")
    <link rel="stylesheet" href="{{ asset('libs/adminLTE/plugins/icheck/skins/square/green.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/adminLTE/plugins/toogle/css/bootstrap-toggle.min.css') }}">
@endsection

@section('content')
    <div class="box box-solid box-default">
        <div class="box-header with-border">
            <h3 class="box-title">{{$facultad->nombre}}</h3>
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
                            <th>Rol en plenaria</th>
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
                            <td>
                                @if($asambleista->propietario == 1)
                                    Propietario oficial
                                @else
                                    Suplente oficial
                                @endif
                            </td>
                            <td>{{$asambleista->sector->nombre}}</td>
                            @php $presente_plenaria = 0 @endphp
                            @forelse($asistentes as $asistente)
                                @if($asistente->asambleista_id == $asambleista->id)
                                    @php $presente_plenaria = 1 @endphp
                                    <td>{{$asistente->entrada}}</td>
                                    @if($asistente->propietaria == 1)
                                        <td class="success" >Propietario en plenaria</td>
                                        {!! Form::open(['route'=>['cambiar_propietaria'],'method'=> 'POST','id'=>$asistente->id.'1']) !!}    
                                        <input type="hidden" name="id_asistente" id="id_asistente" value="{{$asistente->id}}">
                                        <input type="hidden" name="id_facultad" id="id_facultad" value="{{$facultad->id}}">
                                        <input type="hidden" name="id_agenda" id="id_agenda" value="{{$agenda->id}}">
                                        <td><button type="submit" class="btn btn-primary" >Suplente</button></td>
                                        {!! Form::close() !!}
                                    @else
                                        <td>Suplente en plenaria</td>
                                        @if($asambleista->sector_id == 1) 
                                            @if($sector1 < 2)
                                                {!! Form::open(['route'=>['cambiar_propietaria'],'method'=> 'POST','id'=>$asistente->id.'2']) !!}    
                                                <input type="hidden" name="id_asistente" id="id_asistente" value="{{$asistente->id}}">
                                                <input type="hidden" name="id_facultad" id="id_facultad" value="{{$facultad->id}}">
                                                <input type="hidden" name="id_agenda" id="id_agenda" value="{{$agenda->id}}">
                                                <td><button type="submit" class="btn btn-primary" >Propietario</button></td>
                                                {!! Form::close() !!}
                                            @else
                                                <td><button type="submit" class="btn btn-primary" disabled="disabled">Propietario</button></td>
                                            @endif
                                        @endif

                                        @if($asambleista->sector_id == 2) 
                                            @if($sector2 < 2)
                                                {!! Form::open(['route'=>['cambiar_propietaria'],'method'=> 'POST','id'=>$asistente->id.'3']) !!}    
                                                <input type="hidden" name="id_asistente" id="id_asistente" value="{{$asistente->id}}">
                                                <input type="hidden" name="id_facultad" id="id_facultad" value="{{$facultad->id}}">
                                                <input type="hidden" name="id_agenda" id="id_agenda" value="{{$agenda->id}}">
                                                <td><button type="submit" class="btn btn-primary" >Propietario</button></td>
                                                {!! Form::close() !!}
                                            @else
                                                <td><button type="submit" class="btn btn-primary" disabled="disabled">Propietario</button></td>
                                            @endif
                                        @endif

                                        @if($asambleista->sector_id == 3) 
                                            @if($sector3 < 2)
                                                {!! Form::open(['route'=>['cambiar_propietaria'],'method'=> 'POST','id'=>$asistente->id.'4']) !!}    
                                                <input type="hidden" name="id_asistente" id="id_asistente" value="{{$asistente->id}}">
                                                <input type="hidden" name="id_facultad" id="id_facultad" value="{{$facultad->id}}">
                                                <input type="hidden" name="id_agenda" id="id_agenda" value="{{$agenda->id}}">
                                                <td><button type="submit" class="btn btn-primary" >Propietario</button></td>
                                                {!! Form::close() !!}
                                            @else
                                                <td><button type="submit" class="btn btn-primary" disabled="disabled">Propietario</button></td>
                                            @endif
                                        @endif

                                    
                                    @endif
                                    
                                @endif
                                    

                            @empty

                            @endforelse
                        @if($presente_plenaria == 0)
                            <td class="danger">No presente</td>
                            <td class="danger">-</td>
                            <td class="danger">-</td>
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