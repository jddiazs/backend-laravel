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

# Primer paso crear la rutas
# Las rutas deben indicar a que metodo http pertenecen  get | post | put | delete
# Se debe dar la ruta o punto de acceso
# indicar cual es el controlado y el nombre del metodo que atiende esa solicitud  controllername@method
# crear el controlador con el comando php artisan make:controller UserController
# nombrar la ruta ayuda a tener una referencia
Route::get('/', 'UserController@index');
Route::post('users', 'UserController@store')->name('users.store');
Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy');

/**Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/posts', 'PostController@posts')->name('posts.index');
Route::get('/post/{post}', 'PostController@post')->name('posts.show');
