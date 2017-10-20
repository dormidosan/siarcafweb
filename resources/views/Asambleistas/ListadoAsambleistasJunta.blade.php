@extends('layouts.app')

@section("content")
    <div class="box box-danger ">
        <div class="box-header with-border">
            <h3 class="box-title">Asambleistas de Junta Directiva</h3>
        </div>
        <div class="box-body">
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
                    @php $i = 1 @endphp
                    @foreach($asambleistas as $asambleista)
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
                            <td style="vertical-align: middle">{{ $asambleista->asambleista->user->persona->primer_nombre . " " . $asambleista->asambleista->user->persona->segundo_nombre . " " . $asambleista->asambleista->user->persona->primer_apellido . " " . $asambleista->asambleista->user->persona->segundo_apellido }}</td>
                            <td style="vertical-align: middle">{{ $asambleista->asambleista->sector->nombre }}</td>
                            <td style="vertical-align: middle">{{ $asambleista->cargo }}</td>
                        </tr>
                        @php $i++ @endphp
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

