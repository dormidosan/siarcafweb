@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('') }}">
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
                        <th>Accion</th>
                    </tr>
                    </thead>
                    <tbody id="cuerpoTabla">
                    <!--
                       <tr>
                           <td>Lo he dejado quemado para que</td>
                           <td>no se vea solo :v</td>
                           <td><a href="#" class="btn btn-block btn-success btn-xs">Descargar</a></td>
                           <td>Opcion</td>
                       </tr>
                       -->
                    @php $contador =1 @endphp
                    @forelse($reuniones as $reunion)
                        <form id="reunion_comision" name="reunion_comision" method="post" action="{{ url("reunion_comision") }}" class="text-center">
                            <tr>
                                <td class="hidden">
                                    <input type="hidden" id="id_reunion" name="id_reunion" value="{{ $reunion->id }}">
                                </td>
                                <td>
                                    {!! $contador !!}
                                    @php $contador++ @endphp
                                </td>
                                <td>
                                        {!! $reunion->codigo !!}
                                </td>
                                <td>
                                    {!! $reunion->lugar !!}
                                </td>
                                <td>
                                    {!! $reunion->convocatoria !!}
                                </td>
                                <td>
                                    {!! $reunion->inicio !!}
                                </td>
                                <td>
                                    {!! $reunion->fin !!}
                                </td>
                                <td>
                                    @if($reunion->vigente == 1)
                                        <button type="submit" class="btn btn-info btn-xs btn-block"><i
                                                    class="fa fa-eye"></i> Ver
                                        </button>
                                    @else
                                        <button type="submit" class="btn btn-info btn-xs btn-block" disabled><i
                                                    class="fa fa-eye"></i> Ver
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        </form>
                    @empty
                        <tr>
                            <td colspan="7">No hay reuniones que mostrar</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section("js")
    <script src="{{ asset('') }}"></script>
@endsection


@section("scripts")
    <script type="text/javascript">
        $(function () {
        });
    </script>
@endsection