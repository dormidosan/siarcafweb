@extends('layouts.app')

@section("styles")
@endsection

@section("content")
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Monitoreo de Peticion</h3>
        </div>
        <div class="box-body">
            <form id="monitorearPeticion" method="post" action="#">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label>Numero de Peticion</label>
                            <input type="text" class="form-control" placeholder="Ingrese numero" id="numero"
                                   name="numero">
                        </div>
                    </div>

                </div>
                <div class="row text-center">
                    <div class="col-lg-12 col-sm-12 col-md-12">
                        <button type="submit" id="buscar" name="buscar" class="btn btn-primary">Buscar</button>
                    </div>
                </div>
            </form>

            <br><br>
            <!-- Tabla que mostrara el estado, se actualizara con ajax -->
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Estado de la Peticion #########</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="resultado"
                               class="table table-striped table-bordered table-condensed table-hover text-center">
                            <thead>
                            <tr>
                                <th>Etapa</th>
                                <th>Fecha</th>
                                <th>Condicion</th>
                            </tr>
                            </thead>

                            <tbody id="cuerpoTabla">
                            <tr>
                                <td>Junta Directiva</td>
                                <td>01/01/1999</td>
                                <td><span class="label label-success">Recibida</span></td>
                            </tr>
                            <tr>
                                <td>Comision</td>
                                <td></td>
                                <td><span class="label label-danger">Pendiente</span></td>
                            </tr>
                            <tr>
                                <td>AGU</td>
                                <td></td>
                                <td><span class="label label-danger">Pendiente</span></td>
                            </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section("js")
@endsection

@section("scripts")
@endsection