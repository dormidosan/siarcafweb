@extends('layouts.app')

@section("styles")
    <!-- Datatables-->
    <link rel="stylesheet" href="{{ asset('libs/adminLTE/plugins/datatables/dataTables.bootstrap.css') }}">
    <link rel="stylesheet"
          href="{{ asset('libs/adminLTE/plugins/datatables/responsive/css/responsive.bootstrap.min.css') }}">

    <style>
        .dataTables_wrapper.form-inline.dt-bootstrap.no-footer > .row {
            margin-right: 0;
            margin-left: 0;
        }

        table.dataTable thead > tr > th {
            padding-right: 0 !important;
        }

        table{
            width: 100% !important;
        }

        table tbody tr.group td{
            font-weight: bold;
            text-align: left;
            background: #ddd;
        }

    </style>
@endsection

@section('breadcrumb')
    <section>
        <ol class="breadcrumb">
            <li><a href="{{ route("inicio") }}"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a>Agenda</a></li>
            <li><a href="{{ route("consultar_agenda_vigentes") }}">Consultar Agendas Vigentes</a></li>
            <li><a href="javascript:document.getElementById('sala_sesion_plenaria').submit();">Sesion Plenaria de Agenda {{ $agenda->codigo }}</a></li>
            <li class="active">Control de Asistencias</li>
        </ol>
    </section>
@endsection

@section('content')

    <div class="row hidden">
        <div class="col-lg-4 col-sm-12">
            {!! Form::open(['id'=>'sala_sesion_plenaria','route'=>['sala_sesion_plenaria'],'method'=> 'POST']) !!}
            <input type="hidden" name="id_agenda" id="id_agenda" value="{{$agenda->id}}">
            <button type="submit" id="iniciar" name="iniciar" class="btn btn-danger btn-block"> Regresar a -
                Asistencia plenaria
            </button>
            {!! Form::close() !!}
        </div>
    </div>

    <div class="panel panel-danger">
        <div class="panel-heading">Control de Asistencias</div>
        <div class="panel-body">
            <h4 class="text-center text-bold">{{ $facultad->nombre}}</h4>
        </div>
        <div class="table-responsive">
            <table id="asistencia" class="table text-center">
                <thead>
                <tr>
                    <th>Asambleista</th>
                    <th>Cargo</th>
                    <th>Sector</th>
                    <th>Hora de entrada</th>
                    <th>Rol en plenaria</th>
                    <th>Cambiar a</th>
                </tr>
                </thead>
                <tbody id="cuerpoTabla" class="text-center">

                @forelse($asambleistas as $asambleista)
                    <tr>
                        <td>{{$asambleista->user->persona->primer_nombre." ".$asambleista->user->persona->primer_apellido}}</td>
                        <td>
                            @if($asambleista->propietario == 1)
                                Propietario oficial
                            @else
                                Suplente oficial
                            @endif
                        </td>
                        <td>{{$asambleista->sector->nombre}}</td>
                        @php $presente_plenaria = 0 @endphp
                        @forelse($asistentes as $asistente)
                            @if($asistente->asambleista_id == $asambleista->id)
                                @php $presente_plenaria = 1 @endphp
                                <td>{{$asistente->entrada}}</td>
                                @if($asistente->propietaria == 1)
                                    <td class="success" >Propietario en plenaria</td>
                                    {!! Form::open(['route'=>['cambiar_propietaria'],'method'=> 'POST','id'=>$asistente->id.'1']) !!}
                                    <input type="hidden" name="id_asistente" id="id_asistente" value="{{$asistente->id}}">
                                    <input type="hidden" name="id_facultad" id="id_facultad" value="{{$facultad->id}}">
                                    <input type="hidden" name="id_agenda" id="id_agenda" value="{{$agenda->id}}">
                                    <td><button type="submit" class="btn btn-primary btn-block" >Suplente</button></td>
                                    {!! Form::close() !!}
                                @else
                                    <td>Suplente en plenaria</td>
                                    @if($asambleista->sector_id == 1)
                                        @if($sector1 < 2)
                                            {!! Form::open(['route'=>['cambiar_propietaria'],'method'=> 'POST','id'=>$asistente->id.'2']) !!}
                                            <input type="hidden" name="id_asistente" id="id_asistente" value="{{$asistente->id}}">
                                            <input type="hidden" name="id_facultad" id="id_facultad" value="{{$facultad->id}}">
                                            <input type="hidden" name="id_agenda" id="id_agenda" value="{{$agenda->id}}">
                                            <td><button type="submit" class="btn btn-primary btn-block" >Propietario</button></td>
                                            {!! Form::close() !!}
                                        @else
                                            <td><button type="submit" class="btn btn-primary btn-block" disabled="disabled">Propietario</button></td>
                                        @endif
                                    @endif

                                    @if($asambleista->sector_id == 2)
                                        @if($sector2 < 2)
                                            {!! Form::open(['route'=>['cambiar_propietaria'],'method'=> 'POST','id'=>$asistente->id.'3']) !!}
                                            <input type="hidden" name="id_asistente" id="id_asistente" value="{{$asistente->id}}">
                                            <input type="hidden" name="id_facultad" id="id_facultad" value="{{$facultad->id}}">
                                            <input type="hidden" name="id_agenda" id="id_agenda" value="{{$agenda->id}}">
                                            <td><button type="submit" class="btn btn-primary btn-block" >Propietario</button></td>
                                            {!! Form::close() !!}
                                        @else
                                            <td><button type="submit" class="btn btn-primary btn-block" disabled="disabled">Propietario</button></td>
                                        @endif
                                    @endif

                                    @if($asambleista->sector_id == 3)
                                        @if($sector3 < 2)
                                            {!! Form::open(['route'=>['cambiar_propietaria'],'method'=> 'POST','id'=>$asistente->id.'4']) !!}
                                            <input type="hidden" name="id_asistente" id="id_asistente" value="{{$asistente->id}}">
                                            <input type="hidden" name="id_facultad" id="id_facultad" value="{{$facultad->id}}">
                                            <input type="hidden" name="id_agenda" id="id_agenda" value="{{$agenda->id}}">
                                            <td><button type="submit" class="btn btn-primary btn-block" >Propietario</button></td>
                                            {!! Form::close() !!}
                                        @else
                                            <td><button type="submit" class="btn btn-primary btn-block" disabled="disabled">Propietario</button></td>
                                        @endif
                                    @endif


                                @endif

                            @endif


                        @empty

                        @endforelse
                        @if($presente_plenaria == 0)
                            <td class="danger">No presente</td>
                            <td class="danger">-</td>
                            <td class="danger">-</td>
                        @endif



                    </tr>
                @empty

                @endforelse

                </tbody>

            </table>

        </div>

    </div>
@endsection

@section("js")
    <!-- Datatables -->
    <script src="{{ asset('libs/adminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('libs/adminLTE/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
@endsection


@section("scripts")
    <script type="text/javascript">
        $(function () {
            var table = $('#asistencia').DataTable({
                "columnDefs": [
                    { "visible": false, "targets": 2 }
                ],
                "order": [[ 2, 'asc' ]],
                "displayLength": 25,
                "drawCallback": function ( settings ) {
                    var api = this.api();
                    var rows = api.rows( {page:'current'} ).nodes();
                    var last=null;

                    api.column(2, {page:'current'} ).data().each( function ( group, i ) {
                        if ( last !== group ) {
                            $(rows).eq( i ).before(
                                '<tr class="group"><td colspan="5">'+group+'</td></tr>'
                            );

                            last = group;
                        }
                    } );
                },
            } );

            // Order by the grouping
            $('#asistencia tbody').on( 'click', 'tr.group', function () {
                var currentOrder = table.order()[0];
                if ( currentOrder[0] === 2 && currentOrder[1] === 'asc' ) {
                    table.order( [ 2, 'desc' ] ).draw();
                }
                else {
                    table.order( [ 2, 'asc' ] ).draw();
                }
            } );
        });
    </script>

@endsection
