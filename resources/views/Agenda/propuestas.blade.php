

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
                        <th>accion</th>
                     </tr>
                  </thead>
                  <tbody id="cuerpoTabla" class="text-center">
                  @php $contador = 1 @endphp
                     @forelse($propuestas as $propuesta)
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
                              <input type="hidden" name="id_propuesta" id="id_propuesta" value="{{$propuesta->id}}">
                              <input type="hidden" name="id_agenda" id="id_agenda" value="{{$agenda->id}}"> 
                              <input type="hidden" name="id_punto" id="id_punto" value="{{$punto->id}}"> 
                              <input type="hidden" name="opcion" id="opcion" value="1">     
                              <button type="submit" id="iniciar" name="iniciar" class="btn btn-warning btn-block">Ronda 2</button>    
                            {!! Form::close() !!}
                          @endif
                        </td>
                        <td>
                          
                        </td>
                      </tr>
                      @else
                      <tr>
                        {!! Form::open(['route'=>['guardar_votacion'],'method'=> 'POST']) !!}   
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
                        <input type="text" class="form-control" id="favor" name="favor" value="0">
                        </td>
                        <td>
                        <input type="text" class="form-control" id="contra" name="contra" value="0">
                        </td>
                        <td>
                        <input type="text" class="form-control" id="abstencion" name="abstencion" value="0">
                        </td>
                        <td>
                        <input type="text" class="form-control" id="nulo" name="nulo" value="0">
                        </td>
                        <td>{{ $propuesta->ronda }}</td>
                        <td>{{ $propuesta->activa }}</td>
                        <td>
                          <input type="hidden" name="id_propuesta" id="id_propuesta" value="{{$propuesta->id}}">
                          <input type="hidden" name="id_agenda" id="id_agenda" value="{{$agenda->id}}"> 
                          <input type="hidden" name="id_punto" id="id_punto" value="{{$punto->id}}">  
                          <button type="submit" id="iniciar" name="iniciar" class="btn btn-success btn-block">Guardar</button>    
                        </td>
                        {!! Form::close() !!}
                        <td>
                          {!! Form::open(['route'=>['modificar_propuesta'],'method'=> 'POST']) !!}   
                          <input type="hidden" name="id_propuesta" id="id_propuesta" value="{{$propuesta->id}}">
                          <input type="hidden" name="id_agenda" id="id_agenda" value="{{$agenda->id}}"> 
                          <input type="hidden" name="id_punto" id="id_punto" value="{{$punto->id}}"> 
                          <input type="hidden" name="opcion" id="opcion" value="2">     
                          <button type="submit" id="iniciar" name="iniciar" class="btn btn-danger btn-block">Retirar</button>    
                        {!! Form::close() !!}
                        </td>
                      </tr>

                      @endif
                     @empty
                     <p style="color: red ;">No hay criterios de busqueda</p>
                     @endforelse
                     <tr>
                        {!! Form::open(['route'=>['agregar_propuesta'],'method'=> 'POST']) !!}   
                        <td>
                        {!! Form::select('asambleista_id',$asambleistas_plenaria,null,
                        ['id'=>'asambleista_id','class'=>'form-control','required'=>'required','placeholder' => 'Seleccione asambleista...']) !!}
                          <input type="text" class="form-control" name="nueva_propuesta"  id="nueva_propuesta" placeholder="Digite nueva propuesta">
                          <input type="hidden" name="id_agenda" id="id_agenda" value="{{$agenda->id}}"> 
                          <input type="hidden" name="id_punto" id="id_punto" value="{{$punto->id}}"> 
                        </td>
                        <td>               
                            <button type="submit" id="iniciar" name="iniciar" class="btn btn-success btn-block">Agregar propuesta</button>    
                        </td>
                        {!! Form::close() !!}
                     </tr>
                  </tbody>
               </table>
            </div>
            
         </div>
      </div>
