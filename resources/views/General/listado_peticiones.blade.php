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
                        <th>Correo</th>
                        <th>Fecha de creación</th>
                        {{-- <th>Fecha actual</th> --}}
                        <th>Peticionario</th>
                        <th>Ultima asignacion</th>
                        <th>Visto anteriormente por</th>
                        <th>Resuelto</th>
                        <th>Agendado</th>
                        <th>Comision</th>


                    </tr>
                    </thead>
                    <tbody id="cuerpoTabla">
                    @php $contador =1 @endphp
                    @forelse($peticiones as $peticion)
                        
                        <tr>

                            <td>
                                {!! $contador !!}
                                @php $contador++ @endphp
                            </td>
                            <td>
                                {!! $peticion->codigo !!}
                            </td>
                            <td>
                                {!! $peticion->descripcion !!}
                            </td>
                            <td>
                                {!! $peticion->correo !!}
                            </td>
                            <td>{{ date("m/d/Y h:m A",strtotime($peticion->fecha)) }}</td>
                            {{-- <td>{{ \Carbon\Carbon::now() }}</td>--}}
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
                            @if($peticion->resuelto == 1)
                                <td class="success">
                                    Resuelto
                                </td>
                            @else
                                <td class="danger">
                                    No Resuelto
                                </td>
                            @endif
                            @if($peticion->asignado_agenda == 1)
                                <td class="success">
                                    Agendado
                                </td>
                            @else
                                <td class="danger">
                                    No Agendado
                                </td>
                            @endif
                            @if($peticion->comision == 1)
                                <td class="success">
                                    En comision
                                </td>
                            @else
                                <td >
                                    En JD
                                </td>
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
@section("js")
    <script src="{{ asset('') }}"></script>
@endsection
@section("scripts")
    <script type="text/javascript">
        $(function () {
        });
    </script>
@endsection

