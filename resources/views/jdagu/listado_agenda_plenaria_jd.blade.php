@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('libs/datepicker/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset('libs/adminLTE/plugins/toogle/css/bootstrap-toggle.min.css') }}">
@endsection

@section('breadcrumb')
    <section>

    </section>
@endsection


@section("content")
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Listado de Sesiones Plenarias</h3>
        </div>
        <div class="box-body">
        --
        <form id="convocatoria" method="post" action="{{ url('generar_agenda_plenaria_jd') }}">
             {{ csrf_field() }}
              {{ Form::hidden('id_comision', '1') }}
                <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6">
                    <input name="codigo" type="text" class="form-control" id="codigo" placeholder="Ingrese codigo" required>
                </div>
                    <div class="col-lg-4 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="lugar">Lugar</label>
                            <input name="lugar" type="text" id="lugar" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="fecha">Fecha</label>
                            <div class="input-group date fecha">
                                <input name="fecha" id="fecha" type="text" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 col-md-12">
                        <label>Hora</label>
                        <div class="form-group">
                            <div class='input-group date'>
                                <input name="hora" type='text' id="hora" class="form-control" />
                                <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6">
                    <label for="tra">¿trascendental?</label>
                    <input type="checkbox" name="trascendental" >
                </div>
                <br>
                <div class="row text-center">
                    <div class="col-lg-12 col-sm-12 col-md-12">
                        <button type="submit" class="btn btn-success">Crear</button>
                    </div>
                </div>
            </form>
        --

        <br>
       

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
                    {!! Form::open(['route'=>['eliminar_agenda_creada_jd'],'method'=> 'POST']) !!}
                    <input type="hidden" name="id_agenda" id="id_agenda" value="{{$agenda->id}}">
                        <tr>
                            <td>{!! $contador !!} @php $contador++ @endphp</td>
                            <td>{!! $agenda->codigo !!}</td>
                            <td>{!! $agenda->fecha !!}</td>
                            <td>{!! $agenda->lugar !!}</td>
                            <td>{!! $agenda->trascendental !!}</td>
                            <td>{!! $agenda->vigente !!}</td>
                            <td>{!! $agenda->activa !!}</td>
                            <td>
                                @php $puntos=0 @endphp
                                @forelse($agenda->puntos as $punto) 
                                    @php $puntos++ @endphp
                                @empty
                                @endforelse
                                @if($puntos == 0)
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
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
    </div>

@endsection @section("js")
    <script src="{{ asset('libs/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('libs/datepicker/locales/bootstrap-datepicker.es.min.js') }}"></script>
    <script src="{{ asset('libs/datetimepicker/js/moment.min.js') }}"></script>
    <script src="{{ asset('libs/datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('libs/adminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('libs/adminLTE/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('libs/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('libs/select2/js/i18n/es.js') }}"></script>
    <script src="{{ asset('libs/utils/utils.js') }}"></script>
    <script src="{{ asset('libs/lolibox/js/lobibox.min.js') }}"></script>
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

            $('#hora').datetimepicker({
                format: 'LT',
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