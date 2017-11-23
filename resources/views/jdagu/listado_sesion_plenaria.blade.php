@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('libs/datepicker/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset('libs/adminLTE/plugins/toogle/css/bootstrap-toggle.min.css') }}">
@endsection

@section("content")
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Listado de sesiones plenarias</h3>
        </div>
        <div class="box-body">
            
       
            
        <div class="row">
            <!--
            -<-?-p-hp $-t-odos_puntos=1; ?>
                <div class="col-lg-4 col-sm-12 col-lg-offset-2">
                    <button type="button" id="iniciar" name="iniciar" class="btn btn-success btn-block">Iniciar</button>
                </div>
--> 
            <div class="col-lg-4 col-lg-offset-1 col-sm-12">
            {!! Form::open(['route'=>['iniciar_reunion_jd'],'method'=> 'POST']) !!} {{ Form::hidden('id_reunion', $reunion->id) }} {{ Form::hidden('id_comision', $comision->id) }}
       
                <button type="submit" id="iniciar" name="iniciar" class="btn btn-info btn-block"  >Regresar Reunion JD***</button>
       
            {!! Form::close() !!}
            </div>
             
        
            
            
        </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Listado de sesiones</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table text-center table-striped table-bordered table-hover table-condensed">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>codigo</th>
                                <th>fecha</th>
                                <th>lugar</th>
                                <th>trascendental</th>
                                <th>vigente</th>
                                <th>activa</th>
                                <th>Accion</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $contador=1 @endphp 
                            @forelse($agendas as $agenda) 
                            <tr>
                                <td>{!! $contador !!} @php $contador++ @endphp</td>
                                <td>{!! $agenda->codigo !!}</td>
                                <td>{!! $agenda->fecha !!}</td>
                                <td>{!! $agenda->lugar !!}</td>
                                <td>{!! $agenda->trascendental !!}</td>
                                <td>{!! $agenda->vigente !!}</td>
                                <td>{!! $agenda->activa !!}</td>
                                <td>
                                        {!! Form::open(['route'=>['agregar_puntos_jd'],'method'=> 'POST']) !!}
                                        <input type="hidden" name="id_agenda"   id="id_agenda"   value="{{$agenda->id}}">
                                        <input type="hidden" name="id_comision" id="id_comision" value="{{$comision->id}}">
                                        <input type="hidden" name="id_reunion"  id="id_reunion"  value="{{$reunion->id}}">
                                        @if($agenda->vigente == 1)
                                        <button type="submit" class="btn btn-success">Agregar puntos</button>
                                        @else
                                        <button type="submit" class="btn btn-success" disabled="disabled">Agregar puntos</button>
                                        @endif
                                        
                                        {!! Form::close() !!}
                                </td>
                            </tr>
                            @empty
                                <p style="color: red ;">No hay criterios de busqueda</p>
                            @endforelse


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection @section("js")
    <script src="{{ asset('libs/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('libs/datepicker/locales/bootstrap-datepicker.es.min.js') }}"></script>
    <script src="{{ asset('libs/datetimepicker/js/moment.min.js') }}"></script>
    <script src="{{ asset('libs/datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('libs/adminLTE/plugins/toogle/js/bootstrap-toggle.min.js') }}"></script>
@endsection

@section("scripts")
    <script type="text/javascript">
        $(function () {
            $('.input-group.date.fecha').datepicker({
                format: "dd/mm/yyyy",
                clearBtn: true,
                language: "es",
                autoclose: true,
                todayHighlight: true,
                toggleActive: true
            });

            $('.toogle').bootstrapToggle({
                on: 'Presente',
                off: 'Ausente'
            });
        });


        function cambiar_estado_peticion(id) {
            $.ajax({
                //se envia un token, como medida de seguridad ante posibles ataques
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                type: 'POST',
                url: "{{ route('actualizar_comision') }}",
                data: {
                    "id": id
                },
                success: function (response) {
                    notificacion(response.mensaje.titulo, response.mensaje.contenido, response.mensaje.tipo);
                }
            });
        }
    </script>
@endsection