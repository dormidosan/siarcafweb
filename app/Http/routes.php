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
})->name("inicio");

Route::auth();

Route::get('/home', 'HomeController@index');


/* Routes para Comisiones */

Route::get('/comisiones', 'ComisionController@mostrar_comisiones')->name("mostrar_comisiones");
Route::get('/administrar_comisiones', 'ComisionController@administrar_comisiones')->name("administrar_comisiones");
Route::post('crear_comision', 'ComisionController@crear_comision')->name("crear_comision");
Route::post('actualizar_comision', 'ComisionController@actualizar_comision')->name("actualizar_comision");
Route::post('gestionar_asambleistas_comision', 'ComisionController@gestionar_asambleistas_comision')->name("gestionar_asambleistas_comision");
Route::post('trabajo_comision', 'ComisionController@trabajo_comision')->name("trabajo_comision");
Route::post('agregar_asambleistas_comision', 'ComisionController@agregar_asambleistas_comision')->name("agregar_asambleistas_comision");
Route::post('retirar_asambleista_comision', 'ComisionController@retirar_asambleista_comision')->name("retirar_asambleista_comision");
Route::post('listado_peticiones_comision', 'ComisionController@listado_peticiones_comision')->name("listado_peticiones_comision");
Route::post('seguimiento_peticion_comision', 'ComisionController@seguimiento_peticion_comision')->name("seguimiento_peticion_comision");
Route::post('listado_reuniones_comision', 'ComisionController@listado_reuniones_comision')->name("listado_reuniones_comision");
Route::post('iniciar_reunion_comision', 'ComisionController@iniciar_reunion_comision')->name("iniciar_reunion_comision");
Route::post('asistencia_comision', array('as' => 'asistencia_comision', 'uses' => 'ComisionController@asistencia_comision'));
Route::post('registrar_asistencia_comision', 'ComisionController@registrar_asistencia_comision')->name('registrar_asistencia_comision');


//rutas q aun no uso
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
Route::get('/discutir/{comision}/{id}', function () {
    return view('Comisiones.AdminstrarPuntoComision');
});



Route::post('buscar_planilla_dieta', 'ReportesController@buscar_planilla_dieta')->name("buscar_planilla_dieta");

Route::post('buscar_permisos_temporales', 'ReportesController@buscar_permisos_temporales')->name("buscar_permisos_temporales");

Route::post('buscar_bitacora_correspondencia', 'ReportesController@buscar_bitacora_correspondencia')->name("buscar_bitacora_correspondencia");

Route::post('buscar_permisos_permanentes', 'ReportesController@buscar_permisos_permanentes')->name("buscar_permisos_permanentes");

Route::post('buscar_asistencias', 'ReportesController@buscar_asistencias')->name("buscar_asistencias");

Route::post('buscar_consolidados_renta', 'ReportesController@buscar_consolidados_renta')->name("buscar_consolidados_renta");


/* Peticiones */
/*
Route::get('/RegistrarPeticion', function () {
    return view('General.RegistroPeticion');
});
*/
Route::get('RegistrarPeticion', array('as' => 'RegistrarPeticion', 'uses' => 'PeticionController@vista_registrar_peticion'));
Route::get('/MonitorearPeticion', function () {
    return view('General.MonitoreoPeticion');
});


/* Reportes */

Route::get('/Reporte_permisos_permanentes', function () {
    return view('Reportes.Reporte_permisos_permanentes',['resultados'=>NULL]);
});
Route::get('/Reporte_permisos_permanentes/{tipo}', 'ReportesController@Reporte_permisos_permanentes');
Route::get('/Reporte_asistencias_sesion_plenaria', function () {
    return view('Reportes.Reporte_asistencias_sesion_plenaria',['resultados'=>NULL]);
});
Route::get('/Reporte_asistencias_sesion_plenaria/{tipo}', 'ReportesController@Reporte_asistencias_sesion_plenaria');
Route::get('/Reporte_inasistencias_sesion_plenaria_pdf/{tipo}', 'ReportesController@Reporte_inasistencias_sesion_plenaria_pdf');
Route::get('/Reporte_bitacora_correspondencia', function () {
    return view('Reportes.Reporte_bitacora_correspondencia',['resultados'=>NULL]);
});
Route::get('/Reporte_bitacora_correspondencia/{tipo}', 'ReportesController@Reporte_bitacora_correspondencia');
Route::get('/Reporte_planilla_dieta', function () {
    return view('Reportes.Reporte_planilla_dieta',['resultados'=>NULL]);
});
Route::get('/Reporte_planilla_dieta/{tipo}', 'ReportesController@Reporte_planilla_dieta');
Route::get('/Reporte_planilla_dieta_prof_noDocpdf/{tipo}', 'ReportesController@Reporte_planilla_dieta_prof_noDocpdf');
Route::get('/Reporte_planilla_dieta_prof_Doc_pdf/{tipo}', 'ReportesController@Reporte_planilla_dieta_prof_Doc_pdf');
Route::get('/Reporte_consolidados_renta', function () {
    return view('Reportes.Reporte_consolidados_renta',['resultados'=>NULL]);
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
    return view('Reportes.Reporte_permisos_temporales',['resultados'=>NULL]);
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
/*
Rou-t-e-::-g-et('/Parametros', function () {
    return view('Administracion.Parametros');
});
*/

Route::get('/ActualizarPlantilla', function () {
    return view('Administracion.ActualizarPlantilla');
});
Route::get('/GestionarUsuarios', function () {
    return view('Administracion.GestionarUsuario');
});
Route::get('/GestionarPerfiles', function () {
    return view('Administracion.GestionarPerfiles');
});
Route::get('/registrar_usuario', "AdministracionController@registrar_usuario")->name("mostrar_formulario_registrar_usuario");;
Route::post('/guardar_usuario', "AdministracionController@guardar_usuario")->name("guardar_usuario");
Route::get('/periodos_agu', "AdministracionController@mostrar_periodos_agu")->name("periodos_agu");
Route::post('/guardar_periodo', "AdministracionController@guardar_periodo")->name("guardar_periodo");
Route::post('/finalizar_periodo', "AdministracionController@finalizar_periodo")->name("finalizar_periodo");
Route::get('parametros', array('as' => 'parametros', 'uses' => 'AdministracionController@parametros'));
Route::post('almacenar_parametro', array('as' => 'almacenar_parametro', 'uses' => 'AdministracionController@almacenar_parametro'));

/* Asambleistas */
Route::get('/listado_asambleistas_facultad', "AsambleistaController@listado_asambleistas_facultad");
Route::get('/listado_asambleistas_comision', "AsambleistaController@listado_asambleistas_comision");
Route::get('/listado_asambleistas_junta', "AsambleistaController@listado_asambleistas_junta");

/* Junta Directiva*/

Route::get('crear_convocatoria', array('as' => 'crear_convocatoria', 'uses' => 'MailController@crear_convocatoria'));
Route::get('convocatoria_jd', array('as' => 'convocatoria_jd', 'uses' => 'MailController@convocatoria_jd'));
Route::post('mailing_jd', array('as' => 'mailing_jd', 'uses' => 'MailController@mailing_jd'));
Route::get('trabajo_junta_directiva', array('as' => 'trabajo_junta_directiva', 'uses' => 'JuntaDirectivaController@trabajo_junta_directiva'));
Route::get('listado_peticiones_jd', array('as' => 'listado_peticiones_jd', 'uses' => 'JuntaDirectivaController@listado_peticiones_jd'));
Route::get('listado_reuniones_jd', array('as' => 'listado_reuniones_jd', 'uses' => 'JuntaDirectivaController@listado_reuniones_jd'));

Route::post('listado_sesion_plenaria', array('as' => 'listado_sesion_plenaria', 'uses' => 'JuntaDirectivaController@listado_sesion_plenaria'));
Route::post('agregar_puntos_jd', array('as' => 'agregar_puntos_jd', 'uses' => 'JuntaDirectivaController@agregar_puntos_jd'));
Route::post('crear_punto_plenaria', array('as' => 'crear_punto_plenaria', 'uses' => 'JuntaDirectivaController@crear_punto_plenaria'));
Route::post('ordenar_puntos_jd', array('as' => 'ordenar_puntos_jd', 'uses' => 'JuntaDirectivaController@ordenar_puntos_jd'));
Route::post('nuevo_orden', array('as' => 'nuevo_orden', 'uses' => 'JuntaDirectivaController@nuevo_orden'));


Route::post('seguimiento_peticion_jd', array('as' => 'seguimiento_peticion_jd', 'uses' => 'JuntaDirectivaController@seguimiento_peticion_jd'));
Route::get('seguimiento_peticion_individual_jd', array('as' => 'seguimiento_peticion_individual_jd', 'uses' => 'JuntaDirectivaController@seguimiento_peticion_individual_jd'));
Route::post('iniciar_reunion_jd', array('as' => 'iniciar_reunion_jd', 'uses' => 'JuntaDirectivaController@iniciar_reunion_jd'));
Route::post('puntos_agendados', array('as' => 'puntos_agendados', 'uses' => 'JuntaDirectivaController@puntos_agendados'));

Route::post('asistencia_jd', array('as' => 'asistencia_jd', 'uses' => 'JuntaDirectivaController@asistencia_jd'));
Route::post('finalizar_reunion_jd', array('as' => 'finalizar_reunion_jd', 'uses' => 'JuntaDirectivaController@finalizar_reunion_jd'));

Route::post('asignar_comision_jd', array('as' => 'asignar_comision_jd', 'uses' => 'JuntaDirectivaController@asignar_comision_jd'));
Route::post('agendar_plenaria', array('as' => 'agendar_plenaria', 'uses' => 'JuntaDirectivaController@agendar_plenaria'));
Route::get('lista_asignacion', array('as' => 'lista_asignacion', 'uses' => 'JuntaDirectivaController@lista_asignacion'));
Route::post('enlazar_comision', array('as' => 'enlazar_comision', 'uses' => 'JuntaDirectivaController@enlazar_comision'));

/*post*/
Route::post('registrar_peticion', 'PeticionController@registrar_peticion');
Route::post('registrar_asistencia', 'JuntaDirectivaController@registrar_asistencia')->name('registrar_asistencia');
/*
 *
\Mail::send('welcome', [], function ($message){
    $message->to('siarcaf@gmail.com')->subject('Testing mail');
});
*/

/* Routes generales */
Route::get('busqueda', 'DocumentoController@busqueda')->name('busqueda');
Route::post('buscar_documentos', 'DocumentoController@buscar_documentos')->name('buscar_documentos');
Route::get('descargar_documento/{id}', 'DocumentoController@descargar_documento')->name("descargar_documento");