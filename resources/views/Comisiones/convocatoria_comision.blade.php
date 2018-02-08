@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('libs/datepicker/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/datetimepicker/css/bootstrap-datetimepicker.min.css') }}">

    <link rel="stylesheet" href="{{ asset('libs/select2/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/lolibox/css/Lobibox.min.css') }}">

    <link rel="stylesheet" href="{{ asset('libs/adminLTE/plugins/datatables/dataTables.bootstrap.css') }}">
    <link rel="stylesheet"
          href="{{ asset('libs/adminLTE/plugins/datatables/responsive/css/responsive.bootstrap.min.css') }}">
@endsection

@section('breadcrumb')
    <section>
        <ol class="breadcrumb">
            <li><a href="{{ route("inicio") }}"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a>Comisiones</a></li>
            <li><a href="{{ route("administrar_comisiones") }}">Listado de Comisiones</a></li>
            <li><a href="javascript:document.getElementById('trabajo_comision').submit();">Trabajo de Comision</a></li>
            <li class="active">Generar Reunion</li>
        </ol>
    </section>
@endsection

@section("content")

    <div class="hidden">
        <form id="trabajo_comision" name="trabajo_comision" method="post"
              action="{{ url("trabajo_comision") }}">
            {{ csrf_field() }}
            <input class="hidden" id="comision_id" name="comision_id" value="{{$comision->id}}">
            <button class="btn btn-success btn-xs">Acceder</button>
        </form>
    </div>
    <div class="box box-danger">
        <div class="box-header">
            <h3 class="box-title">Generar Reunion</h3>

        </div>

        <div class="box-body">

            <form id="convocatoria" method="post" action="{{ url('crear_reunion_comision') }}">
                {{ csrf_field() }}
                {{ Form::hidden('id_comision', $comision->id) }}
                <div class="row">
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
                                <input name="fecha" id="fecha" type="text" class="form-control"><span
                                        class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 col-md-12">
                        <label>Hora</label>
                        <div class="form-group">
                            <div class='input-group date'>
                                <input name="hora" type='text' id="hora" class="form-control"/>
                                <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-lg-12 col-sm-12 col-md-12">
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </div>
                </div>
            </form>
            <br>
            <div class="table-responsive">
                <table id="reuniones_comisiones" class="table text-center table-bordered hover">
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
                            <td>{{ date("m-d-Y h:m A",strtotime($reunion->inicio)) }}</td>
                            <td>{{ date("m-d-Y h:m A",strtotime($reunion->fin)) }}</td>
                            @if($reunion->vigente == 1)
                                <td>
                                    {!! Form::open(['route'=>['enviar_convocatoria_comision'],'method'=> 'POST','id'=>"c".$reunion->id]) !!}
                                    <input type="hidden" name="id_comision" id="id_comision"
                                           value="{{$reunion->comision_id}}">
                                    <input type="hidden" name="id_reunion" id="id_reunion" value="{{$reunion->id}}">
                                    <button type="submit" class="btn btn-info btn-xs btn-block">
                                        <i class="fa fa-eye"></i> Enviar convocatoria
                                    </button>
                                    {!! Form::close() !!}
                                </td>
                                @if($reunion->activa == 0)
                                    <td>
                                        {!! Form::open(['route'=>['eliminar_reunion_comision'],'method'=> 'POST','id'=>"d".$reunion->id]) !!}
                                        <input type="hidden" name="id_comision" id="id_comision"
                                               value="{{$reunion->comision_id}}">
                                        <input type="hidden" name="id_reunion" id="id_reunion" value="{{$reunion->id}}">
                                        <button type="submit" class="btn btn-danger btn-xs btn-block">
                                            <i class="fa fa-eye"></i> Eliminar reunion
                                        </button>
                                        {!! Form::close() !!}
                                    </td>
                                @else
                                    <td></td>
                                @endif
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">No hay reuniones asociadas con esta comision</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section("js")
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
    </script>
@endsection
@section("lobibox")

    @if(Session::has('success'))
        <script>
            notificacion("Exito", "{{ Session::get('success') }}", "success");
            {{ Session::forget('success') }}
        </script>
    @endif

@endsection