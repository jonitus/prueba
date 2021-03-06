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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('cuentos', 'CuentoController');
Route::get('cuentos/{cuento}/preview', 'CuentoController@preview')->name('cuentos.preview');
Route::resource('paginas', 'PaginaController');
Route::get('cuentos/{cuento}/paginas/create', 'PaginaController@create')->name('paginas.create');
Route::get('cuentos/{cuento}/paginas/{pagina}/edit','PaginaController@edit')->name('paginas.editar');
Route::get('leer/{cuento}','PaginaController@mostrar')->name('paginas.mostrar');
