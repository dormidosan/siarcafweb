@extends('layouts.app')

@section('styles')
    <link href="{{ asset('libs/file/css/fileinput.min.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/file/themes/explorer/theme.min.css') }}" rel="stylesheet">

    <style>
        table tbody tr td{
           vertical-align: middle !important;
        }
    </style>
@endsection

@section('breadcrumb')
    <section>
        <ol class="breadcrumb">
            <li><a href="{{ route("inicio") }}"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a>Administracion</a></li>
            <li><a>Gestionar Usuarios</a></li>
            <li><a class="active">Administrar Usuarios</a></li>
        </ol>
    </section>
@endsection

@section("content")
    <div class="box box-danger">
        <div class="box-header">
            <h3 class="box-title">Administracion Usuarios</h3>
        </div>
        <div class="box-body">
            <!--<table class="table text-center">
                <thead>
                <tr>
                    <th>Foto</th>
                    <th>Usuario</th>
                    <th>Perfil Anterior</th>
                    <th>Nuevo Perfil</th>
                    <th>Coordinador de Comision</th>
                    <th>Junta Directiva</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td><img src="{{ asset("images/default-user.png")}}" class="img-responsive img-sm"></td>
                    <td>Jonatan Lopez</td>
                    <td>Suplente</td>
                    <td>
                        <select class="form-control input-sm" id="perfil">
                            <option id="" value="">-- Seleccione una opcion --</option>
                            <option id="asambleista" value="asambleista">Propetario</option>
                            <option id="opcion2" value="opcion2">Opcion 2</option>
                        </select>
                    </td>
                    <td>
                        <select class="form-control input-sm" id="comision">
                            <option id="" value="">-- Seleccione una opcion --</option>
                            <option id="asambleista" value="asambleista">Propetario</option>
                            <option id="opcion2" value="opcion2">Opcion 2</option>
                        </select>
                    </td>
                    <td>
                        <select class="form-control input-sm" id="jd">
                            <option id="" value="">-- Seleccione una opcion --</option>
                            <option id="asambleista" value="asambleista">Propetario</option>
                            <option id="opcion2" value="opcion2">Opcion 2</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><img src="{{ asset("images/default-user.png")}}" class="img-responsive img-sm"></td>
                    <td>Jonatan Lopez</td>
                    <td>Suplente</td>
                    <td>
                        <select class="form-control input-sm" id="perfil">
                            <option id="" value="">-- Seleccione una opcion --</option>
                            <option id="asambleista" value="asambleista">Propetario</option>
                            <option id="opcion2" value="opcion2">Opcion 2</option>
                        </select>
                    </td>
                    <td>
                        <select class="form-control input-sm" id="comision">
                            <option id="" value="">-- Seleccione una opcion --</option>
                            <option id="asambleista" value="asambleista">Propetario</option>
                            <option id="opcion2" value="opcion2">Opcion 2</option>
                        </select>
                    </td>
                    <td>
                        <select class="form-control input-sm" id="jd">
                            <option id="" value="">-- Seleccione una opcion --</option>
                            <option id="asambleista" value="asambleista">Propetario</option>
                            <option id="opcion2" value="opcion2">Opcion 2</option>
                        </select>
                    </td>
                </tr>


                </tbody>

            </table>-->
                <h4 class="text-center text-bold"><span><i class="fa fa-info-circle"></i></span> Seleccione una opcion para continuar</h4>
                <br>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="box box-warning">
                            <div class="box-body">
                                    <div class="text-center">
                                        <i class="fa fa-key fa-4x text-warning"></i>
                                    </div>
                                    <h3 class="profile-username text-center">Perfiles</h3>
                                    <a class="btn btn-warning btn-block btn-sm" href="{{route("cambiar_perfiles")}}"><b>Acceder</b></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="box box-success">
                            <div class="box-body">
                                <div class="text-center">
                                    <i class="fa fa-user fa-4x text-success"></i>
                                </div>
                                <h3 class="profile-username text-center">Cargos de Comision</h3>
                                <a class="btn btn-success btn-block btn-sm" href="{{route("cambiar_cargos_comision")}}"><b>Acceder</b></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="box box-info">
                            <div class="box-body">
                                <div class="text-center">
                                    <i class="fa fa-users fa-4x text-info"></i>
                                </div>
                                <h3 class="profile-username text-center">Cargos de Junta Directiva</h3>
                                <a class="btn btn-info btn-block btn-sm" href="{{route("cambiar_cargos_junta_directiva")}}"><b>Acceder</b></a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

    </div>
@endsection

@section("js")
    <script src="{{ asset('libs/file/js/fileinput.min.js') }}"></script>
    <script src="{{ asset('libs/file/themes/explorer/theme.min.js') }}"></script>
    <script src="{{ asset('libs/file/js/locales/es.js') }}"></script>
@endsection


@section("scripts")
    <script type="text/javascript">
        $(function () {

            $("#excel").fileinput({
                browseClass: "btn btn-primary btn-block",
                previewFileType: ".xls,.xlsx",
                theme: "explorer",
                //uploadUrl: "/file-upload-batch/2",
                language: "es",
                minFileCount: 1,
                maxFileCount: 1,
                allowedFileExtensions: ['xls', 'xlsx'],
                showUpload: false,
                showPreview: false,
                showCaption: false,
                fileActionSettings: {
                    showRemove: true,
                    showUpload: false,
                    showZoom: true,
                    showDrag: false
                },
                hideThumbnailContent: true
            });

        });
    </script>
@endsection