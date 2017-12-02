@extends('layouts.app')

@section('breadcrumb')
    <section class="">
        <ol class="breadcrumb">
            <li><a href="{{ route("inicio") }}"><i class="fa fa-home"></i> Inicio</a></li>
        </ol>
    </section>
@endsection

@section("content")
    <div class="box box-danger">
        <div class="box-header">
            <h3 class="box-title">Listado de Puntos</h3>
        </div>

        <div class="box-body">
            <div class="table-responsive">
                <table class="table text-center table-bordered hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Romano</th>
                        <th>Descripcion</th>
                        <th>Peticionario</th>
                        <th>Fecha peticion</th>
                        <th colspan="2">Accion</th>
                    </tr>
                    </thead>
                    <tbody id="cuerpoTabla">
                    @php 
                    $contador =1
                    @endphp 
                    @forelse($puntos as $punto)
                        
                        <tr>
                            <td>
                                {!! $contador !!} @php $contador++ @endphp
                            </td>
                            <td>{!! $punto->romano !!}</td>
                            <td>{!! $punto->descripcion !!}</td>
                            <td>{!! $punto->peticion->peticionario !!}</td>
                            <td>{!! $punto->peticion->fecha !!}</td>
                            @if($punto->activo == 1)
                                <td>
                                    {!! Form::open(['route'=>['seguimiento_peticion_jd'],'method'=> 'POST']) !!}
                                    <input type="hidden" name="id_peticion" id="id_peticion" value="{{$punto->peticion->id}}">
                                    <input type="hidden" name="id_agenda" id="id_agenda" value="{{$agenda->id}}">
                                    <button type="submit" class="btn btn-primary btn-xs btn-block" >
                                    <i class="fa fa-eye"></i> Informacion
                                    </button>
                                    {!! Form::close() !!}
                                </td>
                                <td>
                                    {!! Form::open(['route'=>['discutir_punto_plenaria'],'method'=> 'POST']) !!}
                                    <input type="hidden" name="id_punto" id="id_punto" value="{{$punto->id}}">
                                    <input type="hidden" name="id_agenda" id="id_agenda" value="{{$agenda->id}}">
                                    <button type="submit" class="btn btn-success btn-xs btn-block">
                                    <i class="fa fa-eye"></i>Discutir
                                    </button>
                                    {!! Form::close() !!}
                                </td>
                            @else
                                <td>
                                    <button type="submit" class="btn btn-primary btn-xs btn-block" disabled>
                                    <i class="fa fa-eye"></i> Informacion
                                    </button>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-success btn-xs btn-block">
                                    <i class="fa fa-eye"></i> Discutir
                                    </button>
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