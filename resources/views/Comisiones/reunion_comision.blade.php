@extends('layouts.app')

@section("content")
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Reunion de Comision</h3>
        </div>
        <div class="box-body">
            {{-- <div class="row">
                <div class="col-lg-4 col-sm-12 col-lg-offset-2">
                    <button type="button" id="iniciar" name="iniciar" class="btn btn-warning btn-block">Peticiones***
                    </button>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <button type="button" id="iniciar" name="iniciar" class="btn btn-info btn-block">Asistencia***
                    </button>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-4 col-sm-12 col-lg-offset-2">
                    <button type="button" id="iniciar" name="iniciar" class="btn btn-success btn-block">Iniciar</button>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <button type="button" id="iniciar" name="iniciar" class="btn btn-danger btn-block">Finalizar
                    </button>
                </div>
            </div>--}}
            <div class="row">
                <div class="col-lg-4 col-lg-offset-1 col-sm-12">
                    {!! Form::open(['route'=>['asistencia_comision'],'method'=> 'POST']) !!}
                    {{ Form::hidden('id_reunion', $reunion->id) }}
                    {{ Form::hidden('id_comision', $comision->id) }}
                    <button type="submit" id="iniciar" name="iniciar" class="btn btn-info btn-block">Asistencia</button>
                    {!! Form::close() !!}
                </div>

                <div class="col-lg-4 col-lg-offset-2 col-sm-12">
                    {!! Form::open(['route'=>['finalizar_reunion_jd'],'method'=> 'POST']) !!} {{ Form::hidden('id_reunion', $reunion->id) }} {{ Form::hidden('id_comision', $comision->id) }}
                    <button type="submit" id="finalizar" name="finalizar" class="btn btn-danger btn-block">Finalizar
                    </button>
                    {!! Form::close() !!}
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
                                <th colspan="3">Acción</th>
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
                                            {!! $peticion->nombre !!}
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
                                        <input type="submit" class="btn btn-success" name="Guardar"
                                               value="Subir atestado">
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
