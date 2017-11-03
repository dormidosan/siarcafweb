<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Bootstrap & AdminLTE-->
    <link rel="stylesheet" href="{{ asset('libs/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/adminLTE/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/adminLTE/css/skins/_all-skins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/font-awesome-4.7.0/css/font-awesome.min.css') }}">

@yield("styles")

<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'SIARCA') }}</title>

</head>

<body class="fixed sidebar-mini skin-red-light">

<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="{{ url("home") }}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>AGU</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>SIARCA</b></span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="{{ asset('images/default-user.png') }}" class="user-image" alt="User Image">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            @if(Auth::guest())
                                <span class="hidden-xs">Usuario Invitado</span>
                            @else
                                <span class="hidden-xs">{{ Auth::user()->name }}</span>
                            @endif
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="https://almsaeedstudio.com/themes/AdminLTE/dist/img/user2-160x160.jpg"
                                     class="img-circle" alt="User Image">
                                @if(Auth::guest())
                                    <p>
                                        Usuario Invitado
                                        <small>ROL</small>
                                    </p>
                                @else
                                    <p>
                                        {{ Auth::user()->name }}
                                        <small>ROL</small>
                                    </p>
                                @endif

                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Datos de Usuario</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ url("logout") }}" class="btn btn-default btn-flat">Cerrar Sesion</a>
                                </div>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
    </header>

    <!--MENU-->
    <aside class="main-sidebar">
        <div class="slimScrollDiv">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="{{ asset("images/default-user.png") }}" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        @if(Auth::guest())
                            <p>Usuario Invitado</p>
                            <a href="{{url("login")}}"><i class="fa fa-circle text-success"></i>Iniciar Sesion</a>
                        @else
                            <p>{{ Auth::user()->name }}</p>
                            <a href="#"><i class="fa fa-circle text-success"></i>Conectado</a>
                        @endif
                    </div>
                </div>
                <ul class="sidebar-menu tree" data-widget="tree">
                    <li class="header">Menu de Opciones</li>

                    <li><a href="{{ url('/BusquedaDocumentos')}}"><i class="fa fa-book"></i>
                            <span>Buscar documento</span></a>
                    </li>

                    <!-- COMISIONES -->
                    <li class="treeview">
                        <a href="#">
                            <i class="glyphicon glyphicon-equalizer"></i> <span>Comisiones</span>
                            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>

                        <ul class="treeview-menu">
                            <li><a href="{{ url("/comisiones") }}"><i class="fa fa-dot-circle-o"></i> Crear Comision</a>
                            </li>
                            <li><a href="{{ url("/administrar_comisiones") }}"><i class="fa fa-dot-circle-o"></i>Administrar
                                    Comision</a>
                            </li>
                        </ul>
                    </li>

                    <!-- AGENDA -->
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-files-o"></i><span>Agenda</span>
                            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{url("/CrearSesionPlenaria")}}"><i class="fa fa-dot-circle-o"></i>Crear Sesion
                                    Plenaria</a>
                            </li>
                            <li><a href="{{url("/home")}}"><i class="fa fa-dot-circle-o"></i>Consultar agenda
                                    vigente</a>
                            </li>
                            <li><a href="{{url("/HistorialAgendas")}}"><i class="fa fa-dot-circle-o"></i>Historial de agendas</a>
                            </li>
                        </ul>
                    </li>

                    <!-- ASAMBLEISTAS-->
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-users"></i>
                            <span>Asambleistas</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{url("/listado_asambleistas_facultad")}}"><i class="fa fa-dot-circle-o"></i>Listado de
                                    asambleistas</a>
                            </li>
                            <li><a href="{{url("/listado_asambleistas_comision")}}"><i class="fa fa-dot-circle-o"></i>Asambleistas por
                                    comision</a></li>
                            <li><a href="{{url("/listado_asambleistas_junta")}}"><i class="fa fa-dot-circle-o"></i>
                                    Asambleistas de JD</a></li>
                        </ul>
                    </li>

                    <!-- Reporteria-->
                    <li class="treeview">
                        <a href="#">
                            <i class="glyphicon glyphicon-duplicate"></i> <span>Reporteria</span>
                            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="treeview">
                                <a href="#"><i class="fa fa-dot-circle-o"></i> Descargar Plantillas
                                    <span class="pull-right-container"><i
                                                class="fa fa-angle-left pull-right"></i></span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="{{url("/Plantilla_Actas")}}"><i class="fa fa-dot-circle-o"></i>Acuerdos</a></li>
                                    <li><a href="{{url("/home")}}"><i class="fa fa-dot-circle-o"></i>Actas JD</a></li>
                                    <li><a href="{{url("/home")}}"><i class="fa fa-dot-circle-o"></i>Actas AGU</a></li>
                                    <li><a href="{{url("/home")}}"><i class="fa fa-dot-circle-o"></i>Dictamenes</a></li>
                                    <li><a href="{{url("/home")}}"><i class="fa fa-dot-circle-o"></i>Permisos de
                                            Inasistencia</a></li>
                                </ul>
                            </li>
                        </ul>

                        <ul class="treeview-menu">
                            <li class="treeview">
                                <a href="#"><i class="fa fa-dot-circle-o"></i> Reportes
                                    <span class="pull-right-container"><i
                                                class="fa fa-angle-left pull-right"></i></span>
                                </a>
                                <ul class="treeview-menu">


                                    <li><a href="{{url("/Reporte_permisos_temporales")}}"><i
                                                    class="fa fa-dot-circle-o"></i>Listado de permisos
                                            de <br/>sesion plenaria temporales</a></li>
                                    <li><a href="{{url("/Reporte_permisos_permanentes")}}"><i
                                                    class="fa fa-dot-circle-o"></i>Listado de permisos
                                            de <br/>sesión plenaria permanentes</a></li>
                                    <li><a href="{{url("/Reporte_asistencias_sesion_plenaria")}}"><i
                                                    class="fa fa-dot-circle-o"></i>Listado de
                                            asistencia de <br/>asambleístas a sesión plenaria</a></li>
                                    <li><a href="{{url("/Reporte_bitacora_correspondencia")}}"><i
                                                    class="fa fa-dot-circle-o"></i>Bitácora
                                            correspondencia</a>
                                    </li>
                                    <li><a href="{{url("/Reporte_planilla_dieta")}}"><i class="fa fa-dot-circle-o"></i>Planilla
                                            de
                                            dieta</a>
                                    </li>
                                    <li><a href="{{url("/Reporte_consolidados_renta")}}"><i
                                                    class="fa fa-dot-circle-o"></i>Consolidados de
                                            renta</a>
                                    </li>
                                    <li><a href="{{url("/Reporte_constancias_renta")}}"><i
                                                    class="fa fa-dot-circle-o"></i>Constancias de
                                            renta</a>
                                    </li>
                                    <li><a href="{{url("/Reporte_constancias_renta_JD")}}"><i
                                                    class="fa fa-dot-circle-o"></i>Constancia Renta JD</a>
                                    </li>
                                    <li><a href="{{url("/Reporte_Convocatorias")}}"><i
                                                    class="fa fa-dot-circle-o"></i>Convocatorias</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                    </li>

                    <!-- PETICIONES -->
                    <li class="treeview">
                        <a href="#">
                            <i class="glyphicon glyphicon-envelope"></i> <span>Peticiones</span>
                            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url("/RegistrarPeticion") }}"><i class="fa fa-dot-circle-o"></i> Registrar
                                    Peticiones</a></li>
                            <li><a href="{{ url("/MonitorearPeticion") }}"><i class="fa fa-dot-circle-o"></i>Monitorear Peticion</a>
                            </li>
                        </ul>
                    </li>

                    <!-- JD -->
                    <li class="treeview">
                        <a href="#">
                            <i class="glyphicon glyphicon-briefcase"></i> <span>Junta Directiva</span>
                            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('trabajo_junta_directiva') }}"><i class="fa fa-dot-circle-o"></i>Trabajo de JD</a></li>
                            </li>
                        </ul>
                    </li>

                    <!-- Administracion -->
                    <li class="treeview">
                        <a href="#">
                            <i class="glyphicon glyphicon-wrench"></i> <span>Administracion</span>
                            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url("/Parametros") }}"><i class="fa fa-dot-circle-o"></i>Parametros</a></li>
                            <li><a href="{{ url("/ActualizarPlantilla") }}"><i class="fa fa-dot-circle-o"></i>Actualizar plantillas</a>
                            </li>
                            <li class="treeview">
                                <a href="#"><i class="fa fa-dot-circle-o"></i> Gestionar Usuarios
                                    <span class="pull-right-container"><i
                                                class="fa fa-angle-left pull-right"></i></span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="{{url("/GestionarUsuarios")}}"><i class="fa fa-dot-circle-o"></i>Administracion Usuarios</a></li>
                                    <li><a href="{{url("/registrar_usuario")}}"><i class="fa fa-dot-circle-o"></i>Registar Usuarios</a></li>
                                    <li><a href="{{url("/GestionarPerfiles")}}"><i class="fa fa-dot-circle-o"></i>Gestionar Perfiles</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ url("/periodos_agu") }}"><i class="fa fa-dot-circle-o"></i>Periodo AGU</a></li>

                        </ul>
                    </li>

                </ul>
            </section>
            <!-- /.sidebar -->
            <div class="slimScrollBar"></div>
            <div class="slimScrollRail"></div>
        </div>
    </aside>

    <!-- MAIN CONTENT-->
    <div class="content-wrapper">
        <!--<section class="content-header">
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>-->
        <section class="content">
            <div class="row" style="margin: 0 0.1px 0 0.1px !important;">
                <div class="panel panel-danger">
                    <div class="panel-body" style="padding: 0 !important;">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-12">
                                    <img src="{{ asset("images/agu_web5.jpg")}}" class="img-responsive"
                                         alt="Responsive image" style="text-align: justify; margin: 0 auto;">
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-12 text-bold text-center">
                                    <h3 class=" text-red">Asamblea General Universitaria</h3>
                                    <h4 class=" text-red">
                                        Sistema Informático para el Apoyo de Reuniones y Control de Acuerdos de la
                                        Asamblea General Universitaria de la Universidad de El Salvador
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            @yield('content')

        </section>

    </div>


    <footer class="main-footer">
        <strong>Copyright
            © @php $dt = new DateTime();
                echo $dt->format('Y');
            @endphp
            <a href="#">Universidad de El Salvador</a>.</strong> Todos los derechos reservados.
    </footer>

</div>

<script src="{{ asset('libs/bootstrap/js/jquery.min.js') }}"></script>
<script src="{{ asset('libs/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('libs/adminLTE/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('libs/adminLTE/js/app.min.js') }}"></script>

@yield("js")
@yield("scripts")
@yield("lobibox")

</body>

</html>
