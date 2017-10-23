<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

/* Routes generales */
Route::get('BusquedaDocumentos', array('as' => 'BusquedaDocumentos', 'uses' => 'BuscarDocumentoController@busqueda'));
Route::get('descargar_documento/{id}', array('as' => 'descargar_documento', 'uses' => 'BuscarDocumentoController@descargar_documento'));
/*
Route::get('/BusquedaDocumentos', function () {
    return view('General.BusquedaDocumentos');
});
*/

/* Routes para Comisiones */

Route::get('/comisiones', 'ComisionController@mostrar_comisiones')->name("mostrar_comisiones");

Route::get('/AdministrarComisiones', function () {
    return view('Comisiones.AdministrarComision');
});

Route::get('/AdministrarIntegrantes', function () {
    return view('Comisiones.AdministrarIntegrantes');
});

Route::get('/HistorialBitacoras', function () {
    return view('Comisiones.HistorialBitacoras');
});

Route::get('/HistorialDictamenes', function () {
    return view('Comisiones.HistorialDictamenes');
});

Route::get('/TrabajoComision', function () {
    return view('Comisiones.TrabajoComision');
});

Route::get('/ConvocatoriaComision', function () {
    return view('Comisiones.Convocatoria');
});

Route::get('/AsistenciaComision', function () {
    return view('Comisiones.AsistenciaComision');
});

Route::get('/ListadoPuntosComision', function () {
    return view('Comisiones.ListadoPuntosComision');
});

Route::get('/discutir/{comision}/{id}', function () {
    return view('Comisiones.AdminstrarPuntoComision');
});

Route::post('crear_comision', 'ComisionController@crear_comision')->name("crear_comision");
Route::post('actualizar_comision', 'ComisionController@actualizar_comision')->name("actualizar_comision");


/* Peticiones */
Route::get('/RegistrarPeticion', function () {
    return view('General.RegistroPeticion');
});

Route::get('/MonitorearPeticion', function () {
    return view('General.MonitoreoPeticion');
});


/* Reportes */

Route::get('/Reporte_permisos_permanentes', function () {
    return view('Reportes.Reporte_permisos_permanentes');
});

Route::get('/Reporte_permisos_permanentes/{tipo}', 'ReportesController@Reporte_permisos_permanentes');


Route::get('/Reporte_asistencias_sesion_plenaria', function () {
    return view('Reportes.Reporte_asistencias_sesion_plenaria');
});

Route::get('/Reporte_asistencias_sesion_plenaria/{tipo}', 'ReportesController@Reporte_asistencias_sesion_plenaria');

Route::get('/Reporte_inasistencias_sesion_plenaria_pdf/{tipo}', 'ReportesController@Reporte_inasistencias_sesion_plenaria_pdf');




Route::get('/Reporte_bitacora_correspondencia', function () {
    return view('Reportes.Reporte_bitacora_correspondencia');
});

Route::get('/Reporte_bitacora_correspondencia/{tipo}', 'ReportesController@Reporte_bitacora_correspondencia');


Route::get('/Reporte_planilla_dieta', function () {
    return view('Reportes.Reporte_planilla_dieta');
});

Route::get('/Reporte_planilla_dieta/{tipo}', 'ReportesController@Reporte_planilla_dieta');

Route::get('/Reporte_planilla_dieta_prof_noDocpdf/{tipo}', 'ReportesController@Reporte_planilla_dieta_prof_noDocpdf');


Route::get('/Reporte_planilla_dieta_prof_Doc_pdf/{tipo}', 'ReportesController@Reporte_planilla_dieta_prof_Doc_pdf');

Route::get('/Reporte_consolidados_renta', function () {
    return view('Reportes.Reporte_consolidados_renta');
});

Route::get('/Reporte_consolidados_renta/{tipo}', 'ReportesController@Reporte_consolidados_renta');

Route::get('/Reporte_consolidados_renta_docente/{tipo}', 'ReportesController@Reporte_consolidados_renta_docente');

Route::get('/Reporte_constancias_renta', function () {
    return view('Reportes.Reporte_constancias_renta');
});

Route::get('/Reporte_constancias_renta/{tipo}', 'ReportesController@Reporte_constancias_renta');

Route::get('/Reporte_constancias_renta_JD', function () {
    return view('Reportes.Reporte_constancias_renta_JD');
});

Route::get('/Reporte_constancias_renta_JD/{tipo}', 'ReportesController@Reporte_constancias_renta_JD');



Route::get('/Plantilla_Actas', function () {
    return view('Plantillas.Plantilla_actas');
});

Route::get('/Plantilla_actas/{tipo}', 'PlantillasController@Plantilla_actas');


Route::get('/Reporte_permisos_temporales/{tipo}', 'ReportesController@Reporte_permisos_temporales');

Route::get('/Reporte_permisos_temporales', function () {
    return view('Reportes.Reporte_permisos_temporales');
});


Route::get('/Reporte_Convocatorias_pdf/{tipo}', 'ReportesController@Reporte_Convocatorias');

Route::get('/Reporte_Convocatorias', function () {
    return view('Reportes.Reporte_Convocatorias');
});



/* Routes para Agenda */
Route::get('/CrearSesionPlenaria', function () {
    return view('Agenda.CrearSesionPlenaria');
});

Route:: get('/GestionarAsistencia', function () {
    return view('Agenda.GestionarAsistencia');
});

Route::get('/IniciarSesionPlenaria', function () {
    return view('Agenda.IniciarSesionPlenaria');
});

Route::get('/HistorialAgendas', function () {
    return view('Agenda.HistorialAgendas');
});

/* Routes Administracion */
Route::get('/Parametros', function () {
    return view('Administracion.Parametros');
});

Route::get('/ActualizarPlantilla', function () {
    return view('Administracion.ActualizarPlantilla');
});

Route::get('/PeriodoAGU', function () {
    return view('Administracion.PeriodAGU');
});

Route::get('/GestionarUsuarios', function () {
    return view('Administracion.GestionarUsuario');
});

Route::get('/GestionarPerfiles', function () {
    return view('Administracion.GestionarPerfiles');
});

Route::get('/registrar_usuario', "UsuarioController@registrar_usuario")->name("mostrar_formulario_registrar_usuario");;
Route::post('/guardar_usuario', "UsuarioController@guardar_usuario")->name("guardar_usuario");


/* Asambleistas */
Route::get('/listado_asambleistas_facultad', "AsambleistaController@listado_asambleistas_facultad");
Route::get('/listado_asambleistas_comision', "AsambleistaController@listado_asambleistas_comision");
Route::get('/listado_asambleistas_junta', "AsambleistaController@listado_asambleistas_junta");


/*post*/
Route::post('registrar_peticion', 'PeticionController@registrar_peticion');



Route::post('buscar_documento', 'BuscarDocumentoController@buscar_documento');


