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
                <tr>
                    {!! Form::open(['route'=>['agregar_intervencion'],'method'=> 'POST']) !!}
                    <td>
                    </td>
                    <td>
                        {!! Form::select('asambleista_id',$asambleistas_plenaria,null,
                        ['id'=>'asambleista_id','class'=>'form-control','required'=>'required','placeholder' => 'Seleccione asambleista...']) !!}
                        
                        <input type="hidden" name="id_agenda" id="id_agenda" value="{{$agenda->id}}">
                        <input type="hidden" name="id_punto" id="id_punto" value="{{$punto->id}}">
                    </td>
                    <td>
                        <textarea type="text" class="form-control" placeholder="Digite nueva intervencion"
                                      id="nueva_intervencion" name="nueva_intervencion" required="required"></textarea>
                        <!-- <input type="text" class="form-control" name="nueva_intervencion" id="nueva_intervencion"
                               placeholder="Digite nueva intervencion" width="30px"> -->
                    </td>
                    <td>
                        <button type="submit" id="iniciar" name="iniciar" class="btn btn-success btn-block">Agregar
                            intervencion
                        </button>
                    </td>
                    {!! Form::close() !!}
                </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>
