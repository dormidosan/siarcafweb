
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

                <li><a href="{{ url('busqueda')}}"><i class="fa fa-book"></i>
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
                        <li><a href="{{url('#')}}"><i class="fa fa-dot-circle-o"></i>** No funcionara esto ya-Crear
                                Sesion
                                Plenaria</a>
                        </li>
                        <li><a href="{{url('consultar_agendas_vigentes')}}"><i class="fa fa-dot-circle-o"></i>Consultar
                                agenda
                                vigente</a>
                        </li>
                        <li><a href="{{url("/HistorialAgendas")}}"><i class="fa fa-dot-circle-o"></i>Historial de
                                agendas</a>
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
                        <li><a href="{{url("/listado_asambleistas_facultad")}}"><i class="fa fa-dot-circle-o"></i>Listado
                                de
                                asambleistas</a>
                        </li>
                        <li><a href="{{url("/listado_asambleistas_comision")}}"><i class="fa fa-dot-circle-o"></i>Asambleistas
                                por
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
                                <li><a href="{{url("/Plantilla_Actas")}}"><i class="fa fa-dot-circle-o"></i>Acuerdos</a>
                                </li>
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
                        <li><a href="{{ url("/monitoreo_peticion") }}"><i class="fa fa-dot-circle-o"></i>Monitorear
                                Peticion</a>
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
                        <li><a href="{{ url('trabajo_junta_directiva') }}"><i class="fa fa-dot-circle-o"></i>Trabajo
                                de JD</a></li>
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
                        <li><a href="{{ url('parametros') }}"><i class="fa fa-dot-circle-o"></i>Parametros</a></li>
                        <li><a href="{{ url("/ActualizarPlantilla") }}"><i class="fa fa-dot-circle-o"></i>Actualizar
                                plantillas</a>
                        </li>
                        <li class="treeview">
                            <a href="#"><i class="fa fa-dot-circle-o"></i> Gestionar Usuarios
                                <span class="pull-right-container"><i
                                            class="fa fa-angle-left pull-right"></i></span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{url("/GestionarUsuarios")}}"><i class="fa fa-dot-circle-o"></i>Administracion
                                        Usuarios</a></li>
                                <li><a href="{{url("/registrar_usuario")}}"><i class="fa fa-dot-circle-o"></i>Registar
                                        Usuarios</a></li>
                                <li><a href="{{url("/GestionarPerfiles")}}"><i class="fa fa-dot-circle-o"></i>Gestionar
                                        Perfiles</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ url("/periodos_agu") }}"><i class="fa fa-dot-circle-o"></i>Periodo AGU</a>
                        </li>

                    </ul>
                </li>

            </ul>
        </section>
        <!-- /.sidebar -->
        <div class="slimScrollBar"></div>
        <div class="slimScrollRail"></div>
    </div>
</aside>
