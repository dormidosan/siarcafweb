<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="panel_intervenciones">
        <h4 class="panel-title">Intervenciones</h4>
    </div>
    <div class="panel-body">
        {!! Form::open(['route'=>['agregar_intervencion'],'method'=> 'POST','id'=>'agregarPropuesta','id'=>'agregarIntervenciones','class'=>'agregarIntervencion']) !!}
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('asambleista_id', 'Asambleista'); !!}
                    {!! Form::select('asambleista_id',$asambleistas_plenaria,null,['id'=>'asambleista_id_intervencion','class'=>'form-control','required'=>'required','placeholder' => 'Seleccione asambleista...']) !!}
                </div>
            </div>

            <input type="hidden" name="id_agenda" id="id_agenda" value="{{$agenda->id}}">
            <input type="hidden" name="id_punto" id="id_punto" value="{{$punto->id}}">

            <div class="col-lg-8">
                <div class="form-group">
                    {!! Form::label('nueva_intervencion','Intervencion') !!}
                    {!! Form::textarea('nueva_intervencion', null, ['id'=>'nueva_intervencion','class' => 'form-control','size' => '30x4','required'=>'required','placeholder'=>'Digite nueva intervencion']) !!}
                </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-lg-12">
                <button type="submit" id="iniciar" name="iniciar" class="btn btn-primary btn-sm">Agregar Intervencion
                </button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <div class="table-responsive">
        <table id="intervenciones_tabla" class="table table-hover text-center">
            <thead>
            <tr class="text-center">
                <th>Numero</th>
                <th class="text-center">Asambleista</th>
                <th class="text-center">intervencion</th>
            </tr>
            </thead>
            <tbody id="cuerpoTabla">
            @php $contador = 1 @endphp
            @if($punto->intervenciones->isEmpty())
                <tr class="text-center">
                    <td colspan="3">No existen intervenciones actualmente registradas</td>
                </tr>
            @else
                @foreach($punto->intervenciones as $intervencion)
                    <tr class="text-center">
                        <td>
                            {!! $contador !!}
                            @php $contador++ @endphp
                        </td>
                        <td>
                            {{ $intervencion->asambleista->user->persona->primer_nombre }} {{ $intervencion->asambleista->user->persona->primer_apellido }}
                        </td>
                        <td>
                            <a onclick="mostrarIntervencion({{$intervencion->id}})">Mostrar Detalles</a>
                        </td>

                    </tr>

                    {{--@empty
                   <p style="color: red ;">No hay criterios de busqueda</p>--}}
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
</div>