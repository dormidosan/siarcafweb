@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('libs/datepicker/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
@endsection

@section('content')

             




<div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Reporte planilla de dietas</h3>
        </div>
        <div class="box-body">
            <form id="buscarDocs" method="post" action="{{ url("buscar_planilla_dieta") }}">
              {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-4 col-sm-12 col-md-4">
                        <div class="form-group">
                            <label>Tipo</label>
                            
                             <select class="form-control" id="tipoDocumento" name="tipoDocumento">
                                <option value="">--Seleccione una opcion --</option>
                                <option value="0">Por Asambleista</option>
                                <option value="1">Profesional Docente</option>
                                <option value="2">Profesional no Docente</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 col-md-4">
                        <div class="form-group">
                            <label>Criterio de busqueda</label>
                            <input type="text" class="form-control" placeholder="Criterio de busqueda" id="nombre"
                                   name="nombre">                   
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 col-md-4">
                        <div class="form-group">
                            <label for="fecha">Fecha inicial</label>
                            <div class="input-group date fecha">
                                <input id="fecha1" name="fecha1" type="text" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 col-md-4">
                        <div class="form-group">
                            <label for="fecha">Fecha final</label>
                            <div class="input-group date fecha">
                                <input id="fecha2" name="fecha2" type="text" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                            </div>
                        </div>
                    </div>
                   
                </div>

                <div class="row">
                    <div class="col-lg-12 text-center">
                        <button  type="submit" id="buscar" name="buscar" class="btn btn-primary">Buscar</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box-body -->
    </div>




 <div class="box box-solid box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Resultados de Busqueda</h3>
        </div>
        <div class="box-body">
                  <table class="table table-hover">
                   
                    <thead><tr>
                      
                      <th>Nombre </th>
                      
                      <th>Fecha</th>
                      
                      <th>Ver</th>
                      <th>Descargar</th>
                    </tr></thead>
                    <tbody>
                    <tr>                                     
                      <td>
                        Detalle dieta individual
                      </td>
                      <td>fecha</td>
                    
                      <td><a href="{{url("/Reporte_planilla_dieta/1")}}" class="btn btn-block btn-success btn-xs" >VER</a></td>
                      <td><a href="{{url("/Reporte_planilla_dieta/2")}}" class="btn btn-block btn-success btn-xs" >DESCARGAR</a></td>
                    
                    </tr>
                   
                   <tr>                                     
                      <td>
                        Detalle dieta Consolidado profesional no docente
                      </td>
                      <td>fecha</td>
                    
                      <td><a href="{{url("/Reporte_planilla_dieta_prof_noDocpdf/1")}}" class="btn btn-block btn-success btn-xs" >VER</a></td>
                      <td><a href="{{url("/Reporte_planilla_dieta_prof_noDocpdf/2")}}" class="btn btn-block btn-success btn-xs" >DESCARGAR</a></td>
                    
                    </tr>
                     <tr>                                     
                      <td>
                        Detalle dieta Consolidado profesional docente
                      </td>
                      <td>fecha</td>
                    
                      <td><a href="{{url("/Reporte_planilla_dieta_prof_Doc_pdf/1")}}" class="btn btn-block btn-success btn-xs" >VER</a></td>
                      <td><a href="{{url("/Reporte_planilla_dieta_prof_Doc_pdf/2")}}" class="btn btn-block btn-success btn-xs" >DESCARGAR</a></td>
                    
                    </tr>
                  </tbody></table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
  
   <script>
$('#fecha').datepicker({
              format: "dd/mm/yyyy",
                clearBtn: true,
                language: "es",
                autoclose: true,
                todayHighlight: true
            });


  </script>
        
@endsection

 
 @section("js")
    <script src="{{ asset('libs/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('libs/datepicker/locales/bootstrap-datepicker.es.min.js') }}"></script>
    <script src="{{ asset('libs/datetimepicker/js/moment.min.js') }}"></script>
    <script src="{{ asset('libs/datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
@endsection

@section("scripts")
    <script type="text/javascript">
        $(function () {
            $('.input-group.date.fecha').datepicker({
                format: "dd/mm/yyyy",
                clearBtn: true,
                language: "es",
                autoclose: true,
                todayHighlight: true,
                toggleActive: true
            });

            $('#hora').datetimepicker({
                format: 'LT',
            });
        });
    </script>
@endsection