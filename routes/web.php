<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'indexController@welcome')->name('index');
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::resource('Eventos','EventosController')->middleware('auth');
Route::get('Eventos/create/{id}','EventosController@create')
->middleware('auth')->name('Eventos.create');

Route::resource('Paquetes','PaquetesController')->middleware('auth');
Route::resource('Fotos','FotosController')->middleware('auth');

Route::post('/Paquetes/actualizar/{id}', 'PaquetesController@update')
->middleware('auth')->name('Paquetes.actualizar');


Route::post('/Eventos/actualizar/{id}', 'EventosController@update')
->middleware('auth')->name('Eventos.actualizar');

Route::get('/Fotos/Eliminar/{id}', 'FotosController@destroy')
->middleware('auth')->name('Fotos.eliminar');

Route::post('/Fotos/actualizar/{id}', 'FotosController@update')
->middleware('auth')->name('Fotos.actualizar');


Route::get('/Eventos/Eliminar/{id}', 'EventosController@destroy')
->middleware('auth')->name('Eventos.eliminar');

Route::get('/Fotos/create/{id}', 'FotosController@create')
->middleware('auth')->name('Fotos.create');

Route::post('/Fotos/store/{id}', 'FotosController@store')
->middleware('auth')->name('Fotos.store');


Route::resource('Abonos','AbonosController')->middleware('auth');

Route::get('/Abonos/create/{id}', 'AbonosController@create')
->middleware('auth')->name('Abonos.create');

Route::resource('User','UserController')->middleware('auth');

Route::post('/User/actualizar/{id}', 'UserController@update')
->middleware('auth')->name('User.actualizar');

Route::get('/User/password/{id}', 'UserController@edit')
->middleware('auth')->name('User.password');


Route::get('/AEventos/Aindex', 'EventosController@Aindex')
->middleware('auth')->name('Eventos.Aindex');

Route::get('/AEventos/confirmar/{id}', 'EventosController@edit')
->middleware('auth')->name('Eventos.confirmar');

Route::post('/AEventos/sconfirmar/{id}', 'EventosController@cStore')
->middleware('auth')->name('Eventos.cStore');
