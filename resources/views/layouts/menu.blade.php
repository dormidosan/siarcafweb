
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

                @if(Auth::guest())
                    <li><a href="{{ url('busqueda')}}"><i class="fa fa-book"></i>
                            <span>Buscar documento</span></a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="glyphicon glyphicon-envelope"></i> <span>Peticiones</span>
                            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url("/monitoreo_peticion") }}"><i class="fa fa-dot-circle-o"></i>Monitorear
                                    Peticion</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="{{url('login')}}"><i class="fa fa-sign-in"></i>
                            <span>Iniciar Sesion</span></a>
                    </li>
                @else
                    @foreach($modulos_padre as $mp)
                        @if($mp->tiene_hijos)
                            <li class="treeview">
                                <a href="#">
                                    <i class="{{ $mp->icono}}"></i><span>{{ $mp->nombre_modulo }}</span>
                                    <span class="pull-right-container"><i
                                                class="fa fa-angle-left pull-right"></i></span>
                                </a>
                                @foreach($modulos as $mh)
                                    @if(is_null($mh->modulo_padre) != true)
                                        @if($mp->id == $mh->padre->id)
                                            @if($mh->tiene_hijos == false)
                                                <ul class="treeview-menu">
                                                    <li><a href="{{ url("$mh->url") }}"><i
                                                                    class="fa fa-dot-circle-o"></i>{{ $mh->nombre_modulo }}
                                                        </a></li>
                                                </ul>
                                            @else
                                                <ul class="treeview-menu">
                                                    <li class="treeview">
                                                        <a href="#"><i
                                                                    class="fa fa-dot-circle-o"></i> {{ $mh->nombre_modulo }}
                                                            <span class="pull-right-container"><i
                                                                        class="fa fa-angle-left pull-right"></i></span>
                                                        </a>
                                                        @foreach($modulos as $mh2)
                                                            @if(is_null($mh2->modulo_padre) != true)
                                                                @if($mh->id == $mh2->padre->id)
                                                                    <ul class="treeview-menu">
                                                                        <li><a href="{{url("$mh2->url")}}"><i class="fa fa-dot-circle-o"></i>{{$mh2->nombre_modulo}}
                                                                            </a></li>
                                                                    </ul>
                                                                @endif
                                                            @endif
                                                        @endforeach

                                                    </li>
                                                </ul>
                                            @endif
                                            {{-- @if($mh->tiene_jijos)--}}
                                        @endif
                                    @endif
                                @endforeach
                            </li>
                        @else
                            <li><a href="{{ url("$mp->url") }}"><i class="{{ $mp->icono }}"></i><span>{{ $mp->nombre_modulo }}</span></a></li>
                        @endif
                    @endforeach
                @endif


            </ul>
        </section>
        <!-- /.sidebar -->
        <div class="slimScrollBar"></div>
        <div class="slimScrollRail"></div>
    </div>
</aside>
