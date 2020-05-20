<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});
Route::resource('empleados', 'EmpleadoController');
Route::resource('clientes', 'ClienteController');
Route::resource('ordenes', 'OrdenController');
//Abajo van las rutas POST



Auth::routes();
Route::get('/notificaciones', 'EmpleadoController@notificaciones')->name('notificacion');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/chat', 'MessageController@index')->name('chat');

Route::get('/inactivos', 'EmpleadoController@inactivos')->name('inactivos');
Route::get('/configuracion', 'UserController@perfil')->name('perfil');
Route::get('/configuracion/password', 'UserController@password')->name('password');
Route::put('/configuracion/{usuario}', 'UserController@cambiarPerfil')->name('perfil.perfil');
Route::put('/configuracion/password/{usuario}', 'UserController@cambiarPassword')->name('perfil.password');
Route::get('/message/{id}', 'MessageController@getMessage')->name('message');
Route::post('message', 'MessageController@sendMessage');
Route::post('ordenes1','OrdenController@notificar')->name('ordenes.notificar');