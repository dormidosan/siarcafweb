<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Intervenciones</h3>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-hover text-center">
                <thead>
                <tr>
                    <th width="10%">#</th>
                    <th width="20%"></th>
                    <th width="30%">Nombre asambleista</th>
                    <th>intervencion</th>

                </tr>
                </thead>
                <tbody id="cuerpoTabla" class="text-center">
                @php $contador = 1 @endphp
                @foreach($punto->intervenciones as $intervencion)
                    <tr>
                        <td>
                            {!! $contador !!}
                            @php $contador++ @endphp
                        </td>
                        <td>
                            
                        </td>
                        <td>
                            {{ $intervencion->asambleista->user->persona->primer_nombre }} {{ $intervencion->asambleista->user->persona->primer_apellido }}
                        </td>
                        <td>
                            {{ $intervencion->descripcion }}
                            <button type="button" class="btn btn-primary" onclick="mostrarIntervencion()">Mostrar detalle</button>
                        </td>

                    </tr>

                    {{--@empty
                   <p style="color: red ;">No hay criterios de busqueda</p>--}}
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
