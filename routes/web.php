<?php


Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

// Con este declarado no necesito llamar los otrós método del controlador como edit
// Y para llamar los métodos estáticos como destroy
Route::resource('usuario', 'HomeController');

Route::resource('excel','ExcelController');

Route::get('/home', 'HomeController@index')->name('home');

// show en HomeController
// Con validación para números
Route::get('/home/{usuario}', 'HomeController@show')
->where('usuario', '[0-9]+')
->name('usuario.show'); //Nombre para los link dinamicos Detalle usuario

// edit en HomeController
Route::get('/usuario/{usuario}/edit', 'HomeController@edit')
->name('usuario.edit'); //Nombre para los link dinamicos Formulario Usuario Nuevo

// actualizacion usuario en ProfesorController
Route::put('/usuario/{usuario}/edit', 'HomeController@update');

// INDEX CERTIFICAR
Route::get('/home/usuario/ccertificar/{id}', 'HomeController@ccertificar')
->name('usuario.ccertificar');
// Guardar certificado
Route::put('/home/usuario/ccertificar/{id}', 'HomeController@scertificar');

// Elimina un Criterio
Route::get('/home/usuario/borra/{id}', 'HomeController@destroy')->name('usuario.borra');

Route::get('/home/usuario/lista', 'HomeController@lista')->name('usuario.lista');

// ******************* GESTION JURADO ************************

// INDEX VISTA REGISTRO JURADO
Route::get('/home/cjurado', 'HomeController@cjurado')
->name('usuario.cjurado');
// GUARDADO PREGUNTA NUEVO
Route::post('/home/jurado', 'HomeController@sjurado');

// MOSTRAR JURADOS
Route::get('/home/jurado', 'HomeController@jurado')
->name('usuario.jurado'); //Nombre para los link dinamicos Detalle usuario

// VER JURADO
Route::get('/usuario/jurado/{jurado}', 'HomeController@mostrar')
->where('jurado', '[0-9]+')
->name('jurado.mostrar'); //Nombre para los link dinamicos Detalle usuario

// Elimina una Jurado
Route::get('/usuario/jurado/djurado/{id}', 'HomeController@djurado')->name('usuario.djurado');


// **************************** RUTAS CRITERIOS PREGUNTAS *********************

Route::get('/home/pregunta', 'HomeController@preguntas')->name('pregunta.index');

// INDEX REGISTRO CRITERIOS
Route::get('/home/pregunta/create', 'HomeController@create')
->name('pregunta.create'); //Nombre para los link dinamicos Mostrar usuarios

// GUARDADO PREGUNTA NUEVO
Route::post('/home/pregunta', 'HomeController@store'); //Nombre para los link dinamicos Mostrar usuarios

// Elimina un Criterio
Route::get('/home/pregunta/borra/{id}', 'HomeController@del')->name('pregunta.borra');

// Ver Criterio o Pregunta
Route::get('/home/pregunta/{criterio}', 'HomeController@ver')
->where('criterio', '[0-9]+')
->name('pregunta.show'); //Nombre para los link dinamicos Detalle usuario

// edit en HomeController Pregunta o Criterio
Route::get('/pregunta/{criterio}/edit', 'HomeController@ecriterio')
->name('pregunta.edit'); //Nombre para los link dinamicos Formulario Usuario Nuevo

// actualizacion criterio en HomeController
Route::put('/pregunta/{criterio}/edit', 'HomeController@ucriterio');

// **************************** RUTAS FASES *********************

Route::get('/home/fase', 'HomeController@fases')->name('fase.index');

// INDEX REGISTRO FASES
Route::get('/home/fase/create', 'HomeController@cfase')
->name('fase.create'); //Nombre para los link dinamicos Mostrar usuarios

// GUARDADO FASE NUEVO
Route::post('/home/fase', 'HomeController@sfase'); //Nombre para los link dinamicos Mostrar 

// Elimina una fase
Route::get('/home/fase/borra/{id}', 'HomeController@delfase')->name('fase.borra');

// edit en HomeController Fase
Route::get('/fase/{fase}/edit', 'HomeController@efase')
->name('fase.edit'); //Nombre para los link dinamicos Formulario Usuario Nuevo

// actualizacion fase en HomeController
Route::put('/fase/{fase}/edit', 'HomeController@ufase');

// **************************** RUTAS COMUNICADOS *********************

Route::get('/home/comunicado', 'HomeController@comunicados')->name('comunicado.index');

// INDEX REGISTRO COMUNICADO
Route::get('/home/comunicado/create', 'HomeController@ccomunicado')
->name('comunicado.create'); //Nombre para los link dinamicos Mostrar usuarios

// GUARDADO COMUNICADO NUEVO
Route::post('/home/comunicado', 'HomeController@scomunicado'); //Nombre para los link dinamicos Mostrar 

// edit en HomeController Comunicado
Route::get('/comunicado/{comunicado}/show', 'HomeController@showcom')
->name('comunicado.show'); //Nombre para los link dinamicos Formulario Usuario Nuevo

// Elimina una Comunicado
Route::get('/home/comunicado/borra/{id}', 'HomeController@delcomunicado')->name('comunicado.borra');

// edit en HomeController Comunicado
Route::get('/comunicado/{comunicado}/edit', 'HomeController@ecomunicado')
->name('comunicado.edit'); //Nombre para los link dinamicos Formulario Usuario Nuevo

// actualizacion fase en HomeController
Route::put('/comunicado/{comunicado}/edit', 'HomeController@ucomunicado');

// Consulta directa sin el Controlador para pruebas
Route::get('articulos', function(){
	//dd(\App\Modelo::all());
	dd(\App\Usuario::all());
});
