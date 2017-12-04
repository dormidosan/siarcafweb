@extends('layouts.app')

@section('breadcrumb')
    <section>
        <ol class="breadcrumb">
            <li><a href="{{ route("inicio") }}"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a>Agenda</a></li>
            <li><a class="active">Consultar Agendas Vigentes</a></li>
        </ol>
    </section>
@endsection

@section("content")
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Agendas Vigentes</h3>
        </div>

        <div class="box-body">

            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                @php $i = 1 @endphp
                @forelse($agendas_vigentes as $agenda_vigente)

                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="agenda_vigente{{$agenda_vigente->id}}">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion"
                                   href="#collapse{{$agenda_vigente->id}}" aria-expanded="false"
                                   aria-controls="collapse{{$agenda_vigente->id}}" class="text-capitalize">
                                    Agenda Vigente #{{$i}}
                                </a>
                            </h4>
                        </div>

                        <div id="collapse{{$agenda_vigente->id}}" class="panel-collapse collapse " role="tabpanel"
                             aria-labelledby="agenda_vigente{{$agenda_vigente->id}}">
                            <div class="panel-body">

                                <div class="box box-solid">
                                    <div class="box-header with-border">
                                        <i class="fa fa-info"></i>
                                        <h3 class="box-title">Información sobre la Agenda</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <dl class="dl-horizontal">
                                            <dt>Fecha y Hora de Inicio</dt>
                                            <dd>{{ date("d/m/Y h:m A",strtotime($agenda_vigente->inicio)) }}</dd>
                                            <dt>Lugar de Reunion</dt>
                                            <dd>{{ $agenda_vigente->lugar    }}</dd>
                                            <dt>Transcendental</dt>
                                            <dd>{{ $agenda_vigente->trascendental? "Si":"No" }}</dd>
                                        </dl>
                                    </div>
                                    <!-- /.box-body -->
                                </div>

                                <div class="box-header with-border">
                                    <i class="fa fa-list"></i>
                                    <h3 class="box-title">Puntos de la Agenda</h3>
                                </div>
                                <div class="table-responsive">
                                    <table class="table text-center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Peticion</th>
                                            <th>Descripcion</th>
                                            <th>Fecha de creación</th>
                                            <th>Peticionario</th>
                                            <th>Acción</th>
                                        </tr>
                                        </thead>
                                        <tbody class="text-center">
                                        @php $j = 1 @endphp
                                        @foreach($puntos as $punto)
                                            @if($agenda_vigente->id == $punto->agenda_id)
                                                <tr>
                                                    <td>{{ $j }}</td>
                                                    <td>{{ $punto->peticion->codigo }}</td>
                                                    <td>{{ $punto->peticion->descripcion }}</td>
                                                    <td>{{ date("d/m/Y h:m A",strtotime($punto->peticion->created_at)) }}</td>
                                                    <td>{{ $punto->peticion->peticionario }}</td>
                                                    <td>
                                                        {!! Form::open(['route'=>['detalles_punto_agenda_vigente'],'method'=> 'POST']) !!}
                                                        {{ Form::hidden('id_peticion', $punto->peticion->id) }}
                                                        <button type="submit" class="btn btn-primary btn-xs btn-block">
                                                            <i class="fa fa-eye"></i> Ver
                                                        </button>
                                                        {!! Form::close() !!}
                                                    </td>
                                                </tr>
                                            @endif
                                            @php $j++ @endphp
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php $i++ @endphp
                @empty
                    <div class="panel panel-default text-center">
                        <div class="panel-body text-danger" style="font-weight: bold    ">
                            No se encuentra ninguna agenda vigente por el momento
                        </div>
                    </div>
                @endforelse

            </div>

        </div>
    </div>
@endsection

