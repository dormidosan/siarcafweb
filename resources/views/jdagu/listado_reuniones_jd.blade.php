@extends('layouts.app')

@section("content")
    <div class="box box-danger">
        <div class="box-header">
            <h3 class="box-title">Listado de Reuniones</h3>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table class="table text-center table-bordered hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Codigo</th>
                        <th>Lugar</th>
                        <th>Convocatoria</th>
                        <th>Fecha inicio</th>
                        <th>Fecha fin</th>
                        <th>Accion</th>
                    </tr>
                    </thead>
                    <tbody id="cuerpoTabla">
                    @php $contador =1 @endphp
                    @forelse($reuniones as $reunion)
                        {!! Form::open(['route'=>['reunion_jd'],'method'=> 'POST']) !!}
                        <tr>
                            {{ Form::hidden('id_reunion', $reunion->id) }}
                            <td>
                                {!! $contador !!}
                                @php $contador++ @endphp
                            </td>
                            <td>
                                <center>
                                    {!! $reunion->codigo !!}
                                </center>
                            </td>
                            <td>
                                {!! $reunion->lugar !!}
                            </td>
                            <td>
                                {!! $reunion->convocatoria !!}
                            </td>
                            <td>
                                {!! $reunion->inicio !!}
                            </td>
                            <td>
                                {!! $reunion->fin !!}
                            </td>
                            <td>
                                @if($reunion->vigente == 1)
                                    <button type="submit" class="btn btn-primary btn-xs btn-block"><i
                                                class="fa fa-eye"></i> Ver
                                    </button>
                                @else
                                    <button type="submit" class="btn btn-primary btn-xs btn-block" disabled><i
                                                class="fa fa-eye"></i> Ver
                                    </button>
                                @endif
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


