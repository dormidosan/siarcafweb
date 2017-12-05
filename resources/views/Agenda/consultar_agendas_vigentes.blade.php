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
                @forelse($agendas as $agenda)

                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="agenda{{$agenda->id}}">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion"
                                   href="#collapse{{$agenda->id}}" aria-expanded="false"
                                   aria-controls="collapse{{$agenda->id}}" class="text-capitalize">
                                    Agenda Vigente #{{$i}}  
                                    {{ $agenda->codigo}} 
                                    @if ($agenda->activa == 1)
                                        <span style="color: green ;">Sesion inconclusa</span>
                                    @endif
                                    @if ($agenda->trascendental == 1)
                                        <span style="color: red ;">Sesion trascendental</span>
                                    @endif
                                </a>
                            </h4>
                        </div>

                        <div id="collapse{{$agenda->id}}" class="panel-collapse collapse " role="tabpanel"
                             aria-labelledby="agenda{{$agenda->id}}">
                            <div class="panel-body">

                                <div class="box box-solid">
                                    <div class="box-header with-border">
                                        <i class="fa fa-info"></i>
                                        <h3 class="box-title">Información sobre la Agenda</h3>
                                            {!! Form::open(['route'=>['sala_sesion_plenaria'],'method'=> 'POST']) !!} 
                                            <input type="hidden" name="id_agenda" id="id_agenda" value="{{$agenda->id}}">                   
                                            <button type="submit" id="iniciar" name="iniciar" class="btn btn-success btn-block"> Iniciar sesion plenaria</a>                  
                                            {!! Form::close() !!}   
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <dl class="dl-horizontal">
                                            <dt>Fecha y Hora de Inicio</dt>
                                            <dd>{{ date("d/m/Y h:m A",strtotime($agenda->inicio)) }}</dd>
                                            <dt>Lugar de Reunion</dt>
                                            <dd>{{ $agenda->lugar    }}</dd>
                                            <dt>Transcendental</dt>
                                            <dd>{{ $agenda->trascendental? "Si":"No" }}</dd>
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
                                        @forelse($agenda->puntos as $punto)
                                                <tr>
                                                    <td>{{ $j }}</td>
                                                    <td>{{ $punto->peticion->codigo }}</td>
                                                    <td>{{ $punto->peticion->descripcion }}</td>
                                                    <td>{{ date("d/m/Y h:m A",strtotime($punto->peticion->created_at)) }}</td>
                                                    <td>{{ $punto->peticion->peticionario }}</td>
                                                    <td>
                                                        {!! Form::open(['route'=>['detalles_punto_agenda'],'method'=> 'POST']) !!}
                                                        {{ Form::hidden('id_peticion', $punto->peticion->id) }}
                                                        <button type="submit" class="btn btn-primary btn-xs btn-block">
                                                            <i class="fa fa-eye"></i> Ver
                                                        </button>
                                                        {!! Form::close() !!}
                                                    </td>
                                                </tr>
                                            
                                            @php $j++ @endphp
                                        @empty
                                            <p style="color: red ;">No hay criterios de busqueda</p>
                                        @endforelse
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

