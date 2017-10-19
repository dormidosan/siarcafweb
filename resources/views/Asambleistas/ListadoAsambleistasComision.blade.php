@extends('layouts.app')

@section("content")
    <div class="box box-danger ">
        <div class="box-header with-border">
            <h3 class="box-title">Listado de Asambleistas por Comision</h3>
        </div>
        <div class="box-body">
            @foreach($comisiones as $comision)
                @php $i = 1 @endphp
                <div class="panel panel-warning text-center">
                    <div class="panel-heading text-bold text-capitalize">{{ $comision->nombre }}</div>

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table text-center">
                                <thead>
                                <tr>
                                    <th>Numero</th>
                                    <th style="padding-left: 35px">Imagen</th>
                                    <th>Asambleista</th>
                                    <th>Sector</th>
                                    <th>Cargo</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($comision->cargos()->count() > 0)
                                    @foreach($cargos as $cargo)
                                        @if($comision->id == $cargo->comision->id)
                                            <tr>
                                                <td style="vertical-align: middle">{{ $i }}</td>
                                                <td>
                                                    <div class="center-block">
                                                        <img src="{{ asset('images/default-user.png') }}"
                                                             class="img-responsives" width="70px"
                                                             style="margin-left: 25px !important; " alt="User Image">
                                                    </div>
                                                </td>
                                                <td style="vertical-align: middle">{{ $cargo->asambleista->user->persona->primer_nombre . " " . $cargo->asambleista->user->persona->segundo_nombre . " " . $cargo->asambleista->user->persona->primer_apellido . " " . $cargo->asambleista->user->persona->segundo_apellido }}</td>
                                                <td style="vertical-align: middle">{{ $cargo->asambleista->sector->nombre }}</td>
                                                <td style="vertical-align: middle">{{ $cargo->cargo }}</td>
                                            </tr>
                                            @php $i++ @endphp
                                        @endif
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="">Esta comision no cuenta con asambleistas</td>
                                    </tr>
                                @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
