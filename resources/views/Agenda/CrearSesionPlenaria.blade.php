@extends('layouts.app')

@section("styles")
    <link rel="stylesheet" href="{{ asset('libs/adminLTE/plugins/icheck/skins/square/green.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/adminLTE/plugins/toogle/css/bootstrap-toggle.min.css') }}">
@endsection

@section('content')
<div class="box box-danger">
	<div class="box-header with-border">
		<div class="row">
			<!-- Contenedor de ingreso de asambleista-->
			<div class="col-sm-5 col-lg-5 col-md-5">
				<form>
					<div class="input-group input-group-lg input-group-md input-group-sm">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input id="asambleista" type="text" class="form-control" name="asambleista" placeholder="Ingrese Asambleista">
						<div class="input-group-btn">
						    <button type="button" class="btn btn-primary">Agregar</button>
       					</div>
					</div>
				</form>
				<br> </br>
				<!--Panel que despliega el top 5 de los asambleistas ingresados -->
				<div class="panel panel-success">
				      <div class="panel-heading">Ultimos Asambleistas</div>
				      <div class="panel-body">
				      	<ul class="list-group">
						 	<li class="list-group-item">Asambleista 1 </li>
						  	<li class="list-group-item">asambleista 2 </li>
						  	<li class="list-group-item">asambleista 3 </li>
						  	<li class="list-group-item">asambleista 4 </li>
						  	<li class="list-group-item">asambleista 5 </li>
						</ul> 
				      </div>
			    </div>	
			</div>	
			<div class="col-sm-2 col-lg-2 col-md-2"></div>
			<!-- contenedor de sección informativa de quorum e inicio de sesión-->

			<div class="col-sm-2 col-lg-2 col-md-2">
				<div class="panel panel-success">
				    <div class="panel-heading">Asambleistas Propietarios</div>
				     	<div class="panel-body"> <h2>25 </h2></div>

				</div>	
				<table class="table table-bordered">
				    <thead>
				      <tr>
				        <th>Propietarios</th>
				        <th>Calidad de Propietarios</th>
				        <th>Suplente</th>
				        <th>Total de Asistentes</th>
				      </tr>
				    </thead>
				    <tbody>
				      <tr>
				        <td>20</td>
				        <td>5</td>
				        <td>10</td>
				        <td>36</td>
				      </tr>
				    </tbody>
				  </table>
			</div>
			<div class="col-sm-3 col-lg-3 col-md-3">
				 <br></br>
				<div class="input-group-btn">
				    <button type="button" class="btn btn-primary">Iniciar Sesión Plenaria</button>
       			</div>
			</div>
		</div>
		<!--Sección que controla la asistencia para las 12 facultades -->
		<div class="row">
		<div class="col-sm-12 col-lg-12 col-md-12">
			<div class="panel panel-success">
				<div class="panel-heading">Control de Asistencia</div>
					<div class="panel-body">
					    <div class="row">
					      	<div class="col-sm-2 col-lg-2 col-md-2"></div>
					      	<div class="col-sm-2 col-lg-2 col-md-2" class="input-group-btn">
					      		<button type="button" class="btn btn-primary"> Facultad 1 </button>	      			
					      	</div>
					      	<div class="col-sm-2 col-lg-2 col-md-2" class="input-group-btn">
					      		<button type="button" class="btn btn-primary"> Facultad 2 </button>	      			
					      	</div>
					      	<div class="col-sm-2 col-lg-2 col-md-2" class="input-group-btn">
					      		<button type="button" class="btn btn-primary"> Facultad 3 </button>	      			
					      	</div>
					      	<div class="col-sm-2 col-lg-2 col-md-2" class="input-group-btn">
					      		<button type="button" class="btn btn-primary"> Facultad 4 </button>	      			
					      	</div>
					      	<div class="col-sm-2 col-lg-2 col-md-2"></div>
					    </div>
						<br>
					    <div class="row">
					      	<div class="col-sm-2 col-lg-2 col-md-2"></div>
					      	<div class="col-sm-2 col-lg-2 col-md-2" class="input-group-btn">
					      		<button type="button" class="btn btn-primary"> Facultad 5 </button>	      			
					      	</div>
					      	<div class="col-sm-2 col-lg-2 col-md-2" class="input-group-btn">
					      		<button type="button" class="btn btn-primary"> Facultad 6 </button>	      			
					      	</div>
					      	<div class="col-sm-2 col-lg-2 col-md-2" class="input-group-btn">
					      		<button type="button" class="btn btn-primary"> Facultad 7 </button>	      			
					      	</div>
					      	<div class="col-sm-2 col-lg-2 col-md-2" class="input-group-btn">
					      		<button type="button" class="btn btn-primary"> Facultad 8 </button>	      			
					      	</div>
					      	<div class="col-sm-2 col-lg-2 col-md-2"></div>
					    </div>
					    <br>
					    <div class="row">
					    	<div class="col-sm-2 col-lg-2 col-md-2"></div>
					    	<div class="col-sm-2 col-lg-2 col-md-2" class="input-group-btn">
					    		<button type="button" class="btn btn-primary">Facultad 9</button>	      			
					      	</div>
					      	<div class="col-sm-2 col-lg-2 col-md-2" class="input-group-btn">
					    		<button type="button" class="btn btn-primary">Facultad 10</button>	      			
					    	</div>
					    	<div class="col-sm-2 col-lg-2 col-md-2" class="input-group-btn">
					    		<button type="button" class="btn btn-primary">Facultad 11</button>	      			
					    	</div>
					    	<div class="col-sm-2 col-lg-2 col-md-2" class="input-group-btn">
					    		<button type="button" class="btn btn-primary">Facultad 12</button>	      			
					    	</div>
					      	<div class="col-sm-2 col-lg-2 col-md-2"></div>
					    </div>
					</div>
			</div>
			</div>
			
		</div>
			
		</div>   
	</div>

</div>

@endsection

@section("js")
    <!-- Datatables -->
    <script src="{{ asset('libs/adminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('libs/adminLTE/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

@endsection


@section("scripts")
    <script type="text/javascript">
        $(function () {
            var oTable = $('#listadoComisiones').DataTable({
                language: {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                },

            });
        });
    </script>
@endsection