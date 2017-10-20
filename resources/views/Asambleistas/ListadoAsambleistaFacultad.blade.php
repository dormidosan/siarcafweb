@extends('layouts.app')

@section("content")
    <div class="box box-danger ">
        <div class="box-header with-border">
            <h3 class="box-title">Listado de Asambleistas por Comision</h3>
        </div>
        <div class="box-body">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                @foreach($facultades as $facultad)
                    @php $i = 1 @endphp
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="comision{{$facultad->id}}">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion"
                                   href="#collapse{{$facultad->id}}" aria-expanded="false"
                                   aria-controls="collapse{{$facultad->id}}" class="text-capitalize">
                                    {{ $facultad->nombre }}
                                </a>
                            </h4>
                        </div>
                        <div id="collapse{{$facultad->id}}" class="panel-collapse collapse " role="tabpanel"
                             aria-labelledby="heading{{$facultad->id}}">
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
                                        @if($facultad->asambleistas()->count() > 0)
                                            @foreach($asambleistas as $asambleista)
                                                @if($facultad->id == $asambleista->facultad->id)
                                                    <tr>
                                                        <td style="vertical-align: middle">{{ $i }}</td>
                                                        <td>
                                                            <div class="center-block">
                                                                <img src="{{ asset('images/default-user.png') }}"
                                                                     class="img-responsives" width="70px"
                                                                     style="margin-left: 25px !important; "
                                                                     alt="User Image">
                                                            </div>
                                                        </td>
                                                        <td style="vertical-align: middle">{{ $asambleista->user->persona->primer_nombre . " " . $asambleista->user->persona->segundo_nombre . " " . $asambleista->user->persona->primer_apellido . " " . $asambleista->user->persona->segundo_apellido }}</td>
                                                        <td style="vertical-align: middle">{{ $asambleista->sector->nombre }}</td>
                                                        @if($asambleista->propietario == 1)
                                                            <td style="vertical-align: middle">Propetario</td>
                                                        @else
                                                            <td style="vertical-align: middle">Suplente</td>
                                                        @endif
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
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

