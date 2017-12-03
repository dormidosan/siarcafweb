@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('') }}">
@endsection

@section('breadcrumb')
    <section>
        <ol class="breadcrumb">
            <li><a href="{{ route("inicio") }}"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a>Junta Directiva</a></li>
            <li><a href="{{ route("trabajo_junta_directiva") }}">Trabajo Junta Directiva</a></li>
            <li><a class="active">Listado de Peticiones JD</a></li>
        </ol>
    </section>
@endsection

@section("content")
    <div class="box box-danger">
        <div class="box-header">
            <h3 class="box-title">Listado de Peticiones JD</h3>
        </div>

        <div class="box-body">
            <div class="table-responsive">
                <table class="table text-center table-bordered hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Codigo</th>
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
                    @php $contador =1 @endphp
                    @forelse($peticiones as $peticion)
                        {!! Form::open(['route'=>['seguimiento_peticion_jd'],'method'=> 'POST']) !!}
                        <tr>
                            {{ Form::hidden('id_peticion', $peticion->id) }}
                            <td>
                                {!! $contador !!}
                                @php $contador++ @endphp
                            </td>
                            <td>
                                <center>
                                    {!! $peticion->codigo !!}
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
                                {{-- Ultima asignacion --}}
                                @php
                                    $i = ''
                                @endphp
                                @foreach($peticion->seguimientos as $seguimiento)
                                    @if($seguimiento->estado_seguimiento->estado == 'as')
                                        @php
                                            $i = $seguimiento->comision->nombre
                                        @endphp
                                    @endif
                                @endforeach
                                {!! $i !!}
                            </td>
                            <td>
                                {{-- Visto anteriormente por  --}}
                                @php
                                    $i = ''
                                @endphp
                                @foreach($peticion->seguimientos as $seguimiento)
                                    @if($seguimiento->estado_seguimiento->estado !== 'cr' and $seguimiento->estado_seguimiento->estado !== 'se' and $seguimiento->estado_seguimiento->estado !== 'as')
                                        @php
                                            $i = $seguimiento->comision->nombre
                                        @endphp
                                    @endif
                                @endforeach
                                {!! $i !!}
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary btn-sm pull-right">
                                    <i class="fa fa-eye"></i> Ver
                                </button>
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
        $(function () {
        });
    </script>
@endsection

