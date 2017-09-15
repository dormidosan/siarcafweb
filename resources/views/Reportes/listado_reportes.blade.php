@extends('layouts.app')

@section('content')
<section id="contact" class="four">
            <div class="container">
              <form method="get">
              <header>
                <h2>Listado de Asambleistas </h2>
              </header>
      


<div class="row">
            <div class="col-xs-12">
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">REPORTES DEL SISTEMA</h3>
                  <div class="box-tools">
                    <div class="input-group" style="width: 150px;">
                      
                      
                    </div>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                   
                    <thead><tr>
                      <th>ID</th>
                      <th>reporte</th>
                      <th>ver</th>
                      <th>descargar</th>
                    </tr></thead>
                    <tbody>
                    <tr>
                      <td>1</td>
                      <td>Reporte de Usuarios por Pais</td>
                      <td><a href="{{url("/pdf/1")}}"  >VER</a></td>
                      <td><a href="{{url("/pdf/2")}}"  >DESCARGAR</a></td>
                    
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
