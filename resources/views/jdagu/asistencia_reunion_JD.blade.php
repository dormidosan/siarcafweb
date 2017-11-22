@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('libs/lolibox/css/Lobibox.min.css') }}">
@endsection

@section("content")
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Asistencia a Reunion de Junta Directiva</h3>
        </div>

        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover text-center">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Cargo</th>
                        <th>Fecha y Hora de Asistencia</th>
                        <th>Accion</th>
                    </tr>
                    </thead>

                    <tbody>
                    @php $contador = 1 @endphp

                    @if($asistencias->isEmpty() == true)
                        @foreach($cargos as $cargo)
                            <tr>
                                <td>{{$contador}}</td>
                                <td>{{ $cargo->asambleista->user->persona->primer_nombre . ' ' . $cargo->asambleista->user->persona->segundo_nombre . ' ' . $cargo->asambleista->user->persona->primer_apellido . ' ' .  $cargo->asambleista->user->persona->segundo_apellido}}</td>
                                <td>{{ $cargo->cargo }}</td>
                                <td></td>
                                <td>
                                    <form id="registar_asistencia" name="registrar_asistencia"
                                          action="{{ route("registrar_asistencia") }}" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" id="cargo" name="cargo" value="{{ $cargo->id }}">
                                        <input type="hidden" id="comision" name="comision" value="{{ $comision->id }}">
                                        <input type="hidden" id="reunion" name="reunion" value="{{ $reunion->id }}">
                                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-check"></i>
                                            Registrar Asistencia
                                        </button>
                                    </form>
                                </td>
                            @php $contador++ @endphp
                        @endforeach
                    @else
                        @foreach($cargos as $cargo)
                            @php $encontrado = false @endphp
                            @php $hora = "" @endphp
                            <tr>
                                <td>{{$contador}}</td>
                                <td>{{ $cargo->asambleista->user->persona->primer_nombre . ' ' . $cargo->asambleista->user->persona->segundo_nombre . ' ' . $cargo->asambleista->user->persona->primer_apellido . ' ' .  $cargo->asambleista->user->persona->segundo_apellido}}</td>
                                <td>{{ $cargo->cargo }}</td>
                                @foreach($asistencias as $asistencia)
                                    @if($asistencia->cargo->id == $cargo->id)
                                        @php $encontrado = true @endphp
                                        @php $hora = $asistencia->entrada @endphp
                                    @endif
                                @endforeach

                                @if($encontrado == true)
                                    <td>{{ $hora }}</td>
                                    <td class="text-success"><i class="fa fa-check-square-o"></i> Presente</td>
                                @else
                                    <td></td>
                                    <td>
                                        <form id="registar_asistencia" name="registrar_asistencia"
                                              action="{{ route("registrar_asistencia") }}" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" id="cargo" name="cargo" value="{{ $cargo->id }}">
                                            <input type="hidden" id="comision" name="comision"
                                                   value="{{ $comision->id }}">
                                            <input type="hidden" id="reunion" name="reunion"
                                                   value="{{ $reunion->id }}">
                                            <button type="submit" class="btn btn-sm btn-success"><i
                                                        class="fa fa-check"></i>
                                                Registrar Asistencia
                                            </button>
                                        </form>
                                    </td>
                                @endif

                            </tr>
                            @php $contador++ @endphp
                        @endforeach
                    @endif


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section("js")
    <script src="{{ asset('libs/utils/utils.js') }}"></script>
    <script src="{{ asset('libs/lolibox/js/lobibox.min.js') }}"></script>
@endsection

@section("lobibox")
    @if(Session::has('success'))
        <script>
            notificacion("Exito", "{{ Session::get('success') }}", "success");
        </script>
    @endif
@endsection
