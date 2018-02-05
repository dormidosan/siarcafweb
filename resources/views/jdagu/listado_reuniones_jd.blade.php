@extends('layouts.app')

@section('breadcrumb')
    <section class="">
        <ol class="breadcrumb">
            <li><a href="{{ route("inicio") }}"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="{{ route("trabajo_junta_directiva") }}">Junta Directiva</a></li>
            <li><a class="active">Listado de Reuniones</a></li>
        </ol>
    </section>
@endsection

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
                        <th colspan="3">Accion</th>
                    </tr>
                    </thead>
                    <tbody id="cuerpoTabla">
                    @php $contador =1 @endphp @forelse($reuniones as $reunion)
                        
                        <tr>
                            
                            <td>
                                {!! $contador !!} @php $contador++ @endphp
                            </td>
                            <td>{!! $reunion->codigo !!}</td>
                            <td>{!! $reunion->lugar !!}</td>
                            <td>{!! $reunion->convocatoria !!}</td>
                            <td>{!! $reunion->inicio !!}</td>
                            <td>{!! $reunion->fin !!}</td>
                            @if($reunion->vigente == 1)
                            {!! Form::open(['route'=>['iniciar_reunion_jd'],'method'=> 'POST']) !!}
                            <input type="hidden" name="id_comision" id="id_comision" value="{{$reunion->comision_id}}">
                            <input type="hidden" name="id_reunion" id="id_reunion" value="{{$reunion->id}}">
                            <!--
                                <td>
                                    <button type="submit" class="btn btn-primary btn-xs btn-block" disabled><i
                                                class="fa fa-eye"></i> Ver
                                    </button>
                                </td>
                            -->
                                @if($reunion->activa == 0)
                                <td>
                                    <button type="submit" class="btn btn-success btn-xs btn-block"><i
                                                class="fa fa-eye"></i>Iniciar
                                    </button>
                                </td>
                                @else
                                <td>
                                    <button type="submit" class="btn btn-success btn-xs btn-block" ><i
                                                class="fa fa-eye"></i> Continuar
                                    </button>
                                </td>
                                @endif
                             {!! Form::close() !!}   
                                
                            @else
                            <!--
                                <td>
                                    <button type="submit" class="btn btn-primary btn-xs btn-block" disabled><i
                                                class="fa fa-eye"></i> Ver
                                    </button>
                                </td>
                            
                                <td>
                                    <button type="submit" class="btn btn-success btn-xs btn-block" disabled><i
                                                class="fa fa-eye"></i> Iniciar
                                    </button>
                                </td>
                                {!! Form::open(['route'=>['subir_dictamen_jd'],'method'=> 'POST']) !!}
                            <input type="hidden" name="id_comision" id="id_comision" value="{{$reunion->comision_id}}">
                            <input type="hidden" name="id_reunion" id="id_reunion" value="{{$reunion->id}}">
                                <td>
                                    <button type="submit" class="btn btn-warning btn-xs btn-block" >
                                    <i class="fa fa-eye"></i> Subir dictamenes
                                    </button>
                                </td>
                            {!! Form::close() !!}
                            {!! Form::open(['route'=>['subir_bitacora_jd'],'method'=> 'POST']) !!}
                            <input type="hidden" name="id_comision" id="id_comision" value="{{$reunion->comision_id}}">
                            <input type="hidden" name="id_reunion" id="id_reunion" value="{{$reunion->id}}">
                                <td>
                                    <button type="submit" class="btn btn-info btn-xs btn-block" ><i
                                                class="fa fa-eye"></i>Subir Bitacora
                                    </button>
                                </td>
                            {!! Form::close() !!}
                                
                                -->
                                <td>
                                    <button type="submit" class="btn btn-warning btn-xs btn-block" disabled><i
                                                class="fa fa-eye"></i> Continuar
                                    </button>
                                </td>
                                
                                <td>
                                {!! Form::open(['route'=>['subir_bitacora_jd'],'method'=> 'POST']) !!}
                                <input type="hidden" name="id_comision" id="id_comision" value="{{$reunion->comision_id}}">
                                <input type="hidden" name="id_reunion" id="id_reunion" value="{{$reunion->id}}">
                                    <button type="submit" class="btn btn-info btn-xs btn-block" ><i
                                                class="fa fa-eye"></i>Subir Bitacora
                                    </button>
                                {!! Form::close() !!}
                                </td>
                            
                            
                            @endif
                        </tr>
                        @empty
                        <p style="color: red ;">No hay criterios de busqueda</p>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection