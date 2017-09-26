@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('') }}">
@endsection

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
                    <tr>
                        <td>Parametro 1</td>
                        <td>0</td>
                        <td>
                            <input type="text" id="valor1" name="valor1" class="form-control input-sm"
                                   placeholder="Ingrese un valor">
                        </td>
                        <td>
                            <button class="btn btn-primary btn-sm " id="actualizarValor" name="actualizarValor">Actualizar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Parametro 2</td>
                        <td>0</td>
                        <td>
                            <input type="text" id="valor1" name="valor1" class="form-control input-sm"
                                   placeholder="Ingrese un valor">
                        </td>
                        <td>
                            <button class="btn btn-primary btn-sm" id="actualizarValor" name="actualizarValor">Actualizar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Parametro 3</td>
                        <td>0.13</td>
                        <td>
                            <input type="text" id="valor1" name="valor1" class="form-control input-sm"
                                   placeholder="Ingrese un valor">
                        </td>
                        <td>
                            <button class="btn btn-primary btn-sm" id="actualizarValor" name="actualizarValor">Actualizar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Parametro 4</td>
                        <td>0</td>
                        <td>
                            <input type="text" id="valor1" name="valor1" class="form-control input-sm"
                                   placeholder="Ingrese un valor">
                        </td>
                        <td>
                            <button class="btn btn-primary btn-sm" id="actualizarValor" name="actualizarValor">Actualizar</button>
                        </td>
                    </tr>
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