@extends('layouts.app')

@section('content')
<section id="contact" class="four">
            <div class="container">
              <form method="get">
              <header>
                <h2>Permisos temporales de sesiones plenarias</h2>
              </header>

  <script>
$('.datepicker').datepicker({
  format: 'mm/dd/yyyy';
});

  </script>
<div class="row" width="75%" height="75%" style="position:absolute;">

            <div class="col-xs-12">
              <div class="box box-info">
                <div class="box-header">
                
                  <div class="box-tools">
                    <div class="input-group" >
                      
                     
                    </div>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                   
                    <thead><tr>
                      
                      
                      <th>Filtro <select class="form-control" id="tipoDocumento" name="tipoDocumento">
                                <option value="">--Seleccione una opcion --</option>
                                <option value="User">Asambleista</option>
                                <option value="Sesion">Sesion plenaria</option>
                            </select>
                          </th>
                      <th>Fecha inicial: <input class="form-control" type="date" data-provide="datepicker"></th>
                      <th>Fecha final: <input class="form-control" type="date" data-provide="datepicker"></th>
                      <th>Ver</th>
                      <th>Descargar</th>
                    </tr></thead>
                    <tbody>
                    <tr>                                     
                      <td>
                        Nombre permiso
                      </td>
                      <td>fecha 1</td>
                      <td>fecha 2</td>
                      <td><a href="{{url("/Reporte_consolidados_renta/1")}}"  >VER</a></td>
                      <td><a href="{{url("/Reporte_consolidados_renta/2")}}"  >DESCARGAR</a></td>
                    
                    </tr>
                   
                  </tbody></table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
 </div>

  
              </form>

            </div>
          </section>
@endsection
