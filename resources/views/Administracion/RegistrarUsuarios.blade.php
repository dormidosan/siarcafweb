@extends('layouts.app')

@section('styles')
    <link href="{{ asset('libs/file/css/fileinput.min.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/file/themes/explorer/theme.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('libs/lolibox/css/Lobibox.min.css') }}">

    <style>
        .kv-avatar .krajee-default.file-preview-frame, .kv-avatar .krajee-default.file-preview-frame:hover {
            margin: 0;
            padding: 0;
            border: none;
            box-shadow: none;
            text-align: center;
        }

        .kv-avatar {
            display: inline-block;
        }

        .kv-avatar .file-input {
            display: table-cell;
            width: 213px;
        }

        .kv-reqd {
            color: red;
            font-family: monospace;
            font-weight: normal;
        }

        .file-upload-indicator {
            visibility: hidden;
        }
    </style>
@endsection

@section("content")
    <div class="box box-danger">
        <div class="box-header">
            <h3 class="box-title">Ingresar Usuario</h3>
        </div>
        <div class="box-body">

            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <p>Por favor, corriga los siguientes errores:</p>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif  --}}


            <form class="form" id="agregar_usuario" method="post" action="{{ url("guardar_usuario") }}"
                  enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-3 col-lg-3 text-center">
                        <div class="form-group {{ $errors->has('foto') ? 'has-error' : '' }}">
                            <div class="kv-avatar">
                                <div class="file-loading">
                                    <input id="foto" name="foto" type="file" accept="image/*">
                                </div>
                                <span class="text-danger">{{ $errors->first('foto') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group {{ $errors->has('primer_nombre') ? 'has-error' : '' }}">
                                    <label for="primer_nombre">Primer Nombre</label>
                                    <input type="text" class="form-control" id="primer_nombre" name="primer_nombre"
                                           value="{{old("primer_nombre")}}">
                                    <span class="text-danger">{{ $errors->first('primer_nombre') }}</span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group {{ $errors->has('segundo_nombre') ? 'has-error' : '' }}">
                                    <label for="segundo_nombre">Segundo Nombre</label>
                                    <input type="text" class="form-control" id="segundo_nombre" name="segundo_nombre"
                                           value="{{old("segundo_nombre")}}">
                                    <span class="text-danger">{{ $errors->first('segundo_nombre') }}</span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group {{ $errors->has('primer_apellido') ? 'has-error' : '' }}">
                                    <label for="primer_apellido">Primer Apellido</label>
                                    <input type="text" class="form-control" id="primer_apellido" name="primer_apellido"
                                           value="{{old("primer_apellido")}}">
                                    <span class="text-danger">{{ $errors->first('primer_apellido') }}</span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group {{ $errors->has('segundo_apellido') ? 'has-error' : '' }}">
                                    <label for="segundo_apellido">Segundo Apellido</label>
                                    <input type="text" class="form-control" id="segundo_apellido"
                                           name="segundo_apellido"
                                           value="{{old("segundo_apellido")}}">
                                    <span class="text-danger">{{ $errors->first('segundo_apellido') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group {{ $errors->has('correo') ? 'has-error' : '' }}">
                                    <label for="correo">Correo Electronico</label>
                                    <input type="email" class="form-control" id="correo" name="correo"
                                           value="{{old("correo")}}">
                                    <span class="text-danger">{{ $errors->first('correo') }}</span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group {{ $errors->has('dui') ? 'has-error' : '' }}">
                                    <label for="dui">DUI</label>
                                    <input type="text" class="form-control" id="dui" name="dui"
                                           value="{{old("dui")}}">
                                    <span class="text-danger">{{ $errors->first('dui') }}</span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group {{ $errors->has('nit') ? 'has-error' : '' }}">
                                    <label for="nit">NIT</label>
                                    <input type="text" class="form-control" id="nit" name="nit"
                                           value="{{old("nit")}}">
                                    <span class="text-danger">{{ $errors->first('nit') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group {{ $errors->has('afp') ? 'has-error' : '' }}">
                                    <label for="afp">AFP</label>
                                    <input type="text" class="form-control" id="afp" name="afp"
                                           value="{{old("afp")}}">
                                    <span class="text-danger">{{ $errors->first('afp') }}</span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group {{ $errors->has('cuenta') ? 'has-error' : '' }}">
                                    <label for="cuenta">Cuenta Bancaria</label>
                                    <input type="text" class="form-control" id="cuenta" name="cuenta"
                                           value="{{old("cuenta")}}">
                                    <span class="text-danger">{{ $errors->first('cuenta') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group {{ $errors->has('tipo_usuario') ? 'has-error' : '' }}">
                                    <label for="tipo_usuario">Tipo Usuario</label>
                                    <select id="tipo_usuario" name="tipo_usuario" class="form-control">
                                        <option value="">Seleccione</option>
                                        @foreach($tipos_usuario as $tipo)
                                            <option value="{{$tipo->id}}" {{ old('tipo_usuario') == $tipo->id ? 'selected' : '' }}>{{ ucwords($tipo->nombre_rol)}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{ $errors->first('tipo_usuario') }}</span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group {{ $errors->has('sector') ? 'has-error' : '' }}">
                                    <label for="sector">Sector</label>
                                    <select id="sector" name="sector" class="form-control">
                                        <option value="">Seleccione</option>
                                        @foreach($sectores as $sector)
                                            <option value="{{$sector->id}}" {{ old('sector') == $sector->id ? 'selected' : '' }}>{{ ucwords($sector->nombre)}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{ $errors->first('sector') }}</span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group {{ $errors->has('facultad') ? 'has-error' : '' }}">
                                    <label for="facultad">Facultad</label>
                                    <select id="facultad" name="facultad" class="form-control">
                                        <option value="">Seleccione</option>
                                        @foreach($facultades as $facultad)
                                            <option value="{{$facultad->id}}" {{ old('facultad') == $facultad->id ? 'selected' : '' }}>{{ ucwords($facultad->nombre)}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{ $errors->first('facultad') }}</span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group {{ $errors->has('propietario') ? 'has-error' : '' }}">
                                    <label for="propietario">Propietario</label>
                                    <select id="propietario" name="propietario" class="form-control">
                                        <option value="">Seleccione</option>
                                        <option value="1" {{ old('propietario') == 1 ? 'selected' : '' }}>Si</option>
                                        <option value="2" {{ old('propietario') == 2 ? 'selected' : '' }}>No</option>
                                    </select>
                                    <span class="text-danger">{{ $errors->first('propietario') }}</span>
                                </div>
                            </div>
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
    <script src="{{ asset('libs/file/js/fileinput.min.js') }}"></script>
    <script src="{{ asset('libs/file/themes/explorer/theme.min.js') }}"></script>
    <script src="{{ asset('libs/file/js/locales/es.js') }}"></script>
    <script src="{{ asset('libs/utils/utils.js') }}"></script>
    <script src="{{ asset('libs/lolibox/js/lobibox.min.js') }}"></script>
    <script src="{{ asset('libs/adminLTE/plugins/mask/jquery.mask.min.js') }}"></script>
@endsection


@section("scripts")

    <script type="text/javascript">
        $(function () {
            $("#foto").fileinput({
                language: "es",
                overwriteInitial: true,
                maxFileSize: 1500,
                showClose: false,
                showCaption: false,
                browseLabel: '',
                removeLabel: '',
                browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
                removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
                removeTitle: 'Cancelar',
                elErrorContainer: '#kv-avatar-errors-1',
                msgErrorClass: 'alert alert-block alert-danger',
                defaultPreviewContent: '<img src="{{ asset('images/default-user.png') }}" alt="Your Avatar" class="img-responsive">',
                //layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
                layoutTemplates: {main2: '{preview} ' + ' {remove} {browse}'},
                allowedFileExtensions: ["jpg", "png", "gif","jpeg"],
                fileActionSettings: {
                    showRemove: false,
                    showUpload: false,
                    showZoom: false,
                    showDrag: false
                },
                "file-upload-indicator": false
            });
            $('#dui').mask("00000000-0", {placeholder: "99999999-9"});
            $('#nit').mask("0000-000000-000-0", {placeholder: "9999-999999-999-9"});
            $('#afp').mask("000000000000", {placeholder: "999999999999"});
            $('#cuenta').mask("0000000000", {placeholder: "9999999999"});
            $('#correo').mask('A', {'translation': {
                A: { pattern: /[\w@\-.+]/, recursive: true }
            },
            placeholder: "ejemplo@gmail.com"});
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