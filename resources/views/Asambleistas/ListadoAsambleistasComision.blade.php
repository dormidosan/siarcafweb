@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('') }}">
@endsection

@section("content")
    <div class="box box-default box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Listado de Asambleistas por Comision</h3>
        </div>
        <div class="box-body">
            @foreach($comisiones as $comision)
                <div class="panel panel-default ">
                    <div class="panel-heading text-bold text-capitalize">{{ $comision->nombre }}</div>
                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead>
                            <tr>
                                <th>Numero</th>
                                <th>Imagen</th>
                                <th>Asambleista</th>
                                <th>Sector</th>
                                <th>Cargo</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i = 1 @endphp
                            @foreach($cargos as $cargo)
                                @if($comision->id == $cargo->comision->id)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td></td>
                                        <td>{{ $cargo->asambleista->user->persona->primer_nombre . " " . $cargo->asambleista->user->persona->segundo_nombre . " " . $cargo->asambleista->user->persona->primer_apellido . " " . $cargo->asambleista->user->persona->segundo_apellido }}</td>
                                        <td>{{ $cargo->asambleista->sector->nombre }}</td>
                                        <td>{{ $cargo->cargo }}</td>
                                    </tr>
                                @endif
                                @php $i++ @endphp
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach

            @php $i = 0 @endphp
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