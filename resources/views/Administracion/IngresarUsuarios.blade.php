@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('') }}">
@endsection

@section("content")
    <div class="box box-danger">
        <div class="box-header">
            <h3 class="box-title">Ingresar Usuario</h3>
        </div>
        <div class="box-body">
            <form class="form" id="agregar_usuario" method="post" action="">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="primer_nombre">Primer Nombre</label>
                            <input type="text" class="form-control" id="primer_nombre" name="primer_nombre"
                                   placeholder="Ingrese primer nombre">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="segundo_nombre">Segundo Nombre</label>
                            <input type="text" class="form-control" id="segundo_nombre" name="segundo_nombre"
                                   placeholder="Ingrese segundo nombre">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="primer_apellido">Primer Apellido</label>
                            <input type="text" class="form-control" id="primer_apellido" name="primer_apellido"
                                   placeholder="Ingrese primer apellido">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="segundo_apellido">Segundo Apellido</label>
                            <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido"
                                   placeholder="Ingrese segundo apellido">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="dui">DUI</label>
                            <input type="text" class="form-control" id="dui" name="dui" placeholder="Ingrese DUI">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="nit">NIT</label>
                            <input type="text" class="form-control" id="nit" name="nit" placeholder="Ingrese NIT">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="correo">Correo Electronico</label>
                            <input type="text" class="form-control" id="correo" name="correo"
                                   placeholder="Ingrese correo electronico">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="tipo_usuario">Tipo Usuario</label>
                            <select id="tipo_usuario" class="form-control">
                                <option value="">-- Seleccione una opcion --</option>
                                <option value="1">A</option>
                                <option value="1">B</option>
                                <option value="1">C</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="sector">Sector</label>
                            <select id="sector" name="sector" class="form-control">
                                <option value="">-- Seleccione una opcion --</option>
                                <option value="1">Estudiantil</option>
                                <option value="2">Docente</option>
                                <option value="3">No Docente</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="facultad">Facultad</label>
                            <select id="facultad" name="facultad" class="form-control">
                                <option value="">-- Seleccione una opcion --</option>
                                <option value="1">Facultad 1</option>
                                <option value="2">Facultad 2</option>
                                <option value="3">Facultad 3</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="propetario">Propetario</label>
                            <select id="propetario" name="propetario" class="form-control">
                                <option value="">-- Seleccione una opcion --</option>
                                <option value="1">Si</option>
                                <option value="2">No</option>
                            </select>
                        </div>
                    </div>
                </div>


                <div class="row text-center">
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                    <button type="reset" class="btn btn-danger">Limpiar</button>
                </div>
            </form>
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