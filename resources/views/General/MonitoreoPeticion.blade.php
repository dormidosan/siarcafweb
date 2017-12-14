@extends('layouts.app')

@section("styles")
    <style>
        .dataTables_wrapper.form-inline.dt-bootstrap.no-footer > .row {
            margin-right: 0;
            margin-left: 0;
        }
    </style>
    <!-- Datatables-->
    <link rel="stylesheet" href="{{ asset('libs/adminLTE/plugins/datatables/dataTables.bootstrap.css') }}">
    <link rel="stylesheet"
          href="{{ asset('libs/adminLTE/plugins/datatables/responsive/css/responsive.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/select2/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/lolibox/css/Lobibox.min.css') }}">
@endsection

@section('breadcrumb')
    <section>
        <ol class="breadcrumb">
            <li><a href="{{ route("inicio") }}"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a>Peticiones</a></li>
            <li><a class="active">Monitoreo de Peticion</a></li>
        </ol>
    </section>
@endsection

@section("content")
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Monitoreo de Peticion</h3>
        </div>
        <div class="box-body">

            <form id="monitorearPeticion" name="monitorearPeticion" method="post"
                  action="{{ route('consultar_estado_peticion') }}">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-md-12">
                        <div class="form-group {{ $errors->has('codigo_peticion') ? 'has-error' : '' }}">
                            <label for="codigo_peticion">Codigo de Peticion</label>
                            <input type="text" id="codigo_peticion" name="codigo_peticion" class="form-control" placeholder="Ingrese el codigo de su petición" required>
                            <span class="text-danger">{{ $errors->first('codigo_peticion') }}</span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 text-center">
                        <button type="submit" id="consultarPeticion" name="consultarPeticion" class="btn btn-primary">
                            Consultar Peticion
                        </button>
                    </div>
                </div>
            </form>

            <br><br>

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Estado de la Peticion</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="resultado"
                               class="table table-striped table-bordered table-condensed table-hover text-center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre comision</th>
                                <th>Fecha inicio</th>
                                <th>Fecha fin</th>
                                <th>Descripcion</th>
                                <th>Documento</th>
                                <th>Opcion</th>
                            </tr>
                            </thead>
                            {{-- {{ dump(empty($peticionBuscada)) }}
                            {{ dump(is_null($peticionBuscada)) }}
                            {{ dump($peticion) }}--}}

                            @if(empty($peticionBuscada) != true)

                                <tbody id="cuerpoTabla" class="text-center">
                                @php $contador = 1 @endphp
                                @foreach($peticionBuscada->seguimientos as $seguimiento)
                                    <tr>
                                        <td>
                                            {!! $contador !!}
                                            @php $contador++ @endphp
                                        </td>
                                        <td>{{ $seguimiento->comision->nombre }}</td>
                                        <td>{{ $seguimiento->inicio }}</td>
                                        <td>{{ $seguimiento->fin }}</td>
                                        <td>{{ $seguimiento->descripcion }}</td>
                                        @if($seguimiento->documento)
                                            <td>{{ $seguimiento->documento->tipo_documento->tipo }}</td>
                                        @else
                                            <td>
                                                N/A
                                            </td>
                                            <td>
                                                Sin documento
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            @else
                                <tbody>
                                <tr>
                                    <td colspan="7">No se encuentra resultados</td>
                                </tr>
                                </tbody>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section("js")
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

            $('#codigo_peticion').select2({
                placeholder: 'Ingrese su codigo de peticion',
                language: "es",
                width: '100%'
            });
        });
    </script>
@endsection

@section("lobibox")

    @if(Session::has('success'))
        <script>
            notificacion("Exito", "{{ Session::get('success') }}", "success");
        </script>
    @endif

@endsection