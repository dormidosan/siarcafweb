@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('') }}">
@endsection

@section("content")
    <div class="box box-danger">
        <div class="box-header">
            <h3 class="box-title">Puntos de {{ $comision->nombre }}</h3>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table class="table text-center table-bordered hover">
                    <thead>
                    <tr>
                        <th>#</th>
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
                    <tbody>
                    @php $contador =1 @endphp
                    @foreach($peticiones as $peticion)
                        <tr>
                            <td>{!! $contador !!}</td>
                            <td>{{ $peticion->nombre }}</td>
                            <td>{{ $peticion->descripcion }}</td>
                            <td>{{ $peticion->fecha }}</td>
                            <td>{{ \Carbon\Carbon::now() }}</td>
                            <td>{{ $peticion->peticionario }}</td>
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
                                <form id="ver_peticion_comision" target="_blank">
                                    {{ csrf_field() }}
                                    <input type="submit" class="btn btn-info btn-xs btn-block" value="Ver">
                                </form>
                            </td>
                            @php $contador++ @endphp
                        </tr>
                    @endforeach
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