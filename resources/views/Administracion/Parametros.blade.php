@extends('layouts.app')

@section("content")
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Paremetros del Sistema</h3>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table id="parametros"
                       class="table table-striped table-bordered table-condensed table-hover text-center">
                    <thead>
                    <tr>
                        <th>Parametro</th>
                        <th>Valor</th>
                        <th>Nuevo Valor</th>
                        <th>Acción</th>
                    </tr>
                    </thead>
                    
                    <tbody id="cuerpoTabla">
                    @forelse($parametros as $parametro)
                    {!! Form::open(['route'=>['almacenar_parametro'],'method'=> 'POST','id'=>$parametro->id]) !!}
                    <tr>
                        <input type="hidden" name="id_parametro" id="id_parametro" value="{{$parametro->id}}">
                        <td>{!! $parametro->nombre_parametro !!}</td>
                        <td>{!! $parametro->valor !!}</td>
                        <td>
                            <input type="number" id="nuevo_valor" name="nuevo_valor"  onchange="setTwoNumberDecimal" min="0" max="100" step="0.01" value="{{$parametro->valor}}" >
                        </td>
                        <td>
                            <button type="submit" class="btn btn-success">Actualizar</button>
                        </td>
                    </tr>
                    {!! Form::close() !!}
                    @empty

                    @endforelse
                    
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
@endsection
<script type="text/javascript">
    function setTwoNumberDecimal(event) {
    this.value = parseFloat(this.value).toFixed(2);
}

</script>