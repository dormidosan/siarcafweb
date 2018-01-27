<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Propuestas</h3>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-hover text-center">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre propuesta</th>
                    <th>Nombre asambleista</th>
                    <th>favor</th>
                    <th>contra</th>
                    <th>abstencion</th>
                    <th>nulos</th>
                    <th>ronda</th>
                    <th>activa</th>
                </tr>
                </thead>
                <tbody id="cuerpoTabla" class="text-center">
                @php $contador = 1 @endphp
                @foreach($propuestas as $propuesta)
                    @if($propuesta->votado == 1)
                        <tr>
                            <td>
                                {!! $contador !!}
                                @php $contador++ @endphp
                            </td>
                            <td>
                                {{ $propuesta->nombre_propuesta }}
                            </td>
                            <td>
                                {{ $propuesta->asambleista->user->persona->primer_nombre }} {{ $propuesta->asambleista->user->persona->primer_apellido }}
                            </td>
                            <td>
                                {{ $propuesta->favor }}
                            </td>
                            <td>
                                {{ $propuesta->contra }}
                            </td>
                            <td>
                                {{ $propuesta->abstencion }}
                            </td>
                            <td>
                                {{ $propuesta->nulo }}
                            </td>
                            <td>{{ $propuesta->ronda }}</td>
                            <td>{{ $propuesta->activa }}</td>
                            <td>
                                @if($propuesta->ronda == 1 and $propuesta->activa == 1)
                                    {!! Form::open(['route'=>['modificar_propuesta'],'method'=> 'POST']) !!}
                                  
                                    {!! Form::close() !!}
                                @endif
                            </td>
                            <td>

                            </td>
                        </tr>
                    @else

                    @endif
                    {{--@empty
                    <p style="color: red ;">No hay criterios de busqueda</p>--}}
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
