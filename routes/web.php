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
    return view('welcome');
})->name('welcome');
Route::resource('enviados', 'App\Http\Controllers\EnviarController');
Route::resource('empleados', 'EmpleadoController');
Route::resource('clientes', 'ClienteController');
Route::resource('ordenes', 'OrdenController');
//Abajo van las rutas POST

//ruta para pwa en offline
Route::get('/offline', function () {
    return view('vendor.laravelpwa.offline');
});
//rutas de autenticación
Auth::routes();
//ruta para notificaciones personalizada a todos los cliente
Route::get('/notificaciones', 'EmpleadoController@notificaciones')->name('notificacion');
Route::get('notificar', 'OrdenController@fnotificar')->name('fnotificar');
//ruta para cargar la vista de Inicio
Route::get('/home', 'HomeController@index')->name('home');
//ruta para los empleados inactivos
Route::get('/inactivos', 'EmpleadoController@inactivos')->name('inactivos');
//Rutas de configuraciones del usuario
Route::get('/configuracion', 'UserController@perfil')->name('perfil');
Route::get('/configuracion/password', 'UserController@password')->name('password');
Route::put('/configuracion/{usuario}', 'UserController@cambiarPerfil')->name('perfil.perfil');
Route::put('/configuracion/password/{usuario}', 'UserController@cambiarPassword')->name('perfil.password');
//rutas del chat
Route::get('/chat', 'MessageController@index')->name('chat');
Route::get('/message/{id}', 'MessageController@getMessage')->name('message');
Route::post('message', 'MessageController@sendMessage');
//ruta para notificar
Route::post('ordenes1','OrdenController@notificar')->name('ordenes.notificar');
Route::post('ordenes2','OrdenController@notificarAll')->name('ordenes.notificarAll');