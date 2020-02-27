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

Route::resource('users', 'UserController');

Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');

Route::resource('posts', 'PostController');

Route::get('/admin','AdminController@index');

Route::get('/pitanja', 'PitanjaController@index');

Route::get('/odabir_kategorije', 'PitanjaController@odabir');

Route::post('/provera_korisnika', 'PitanjaController@provera_korisnika');

Route::get('/vezba', 'VezbaController@index');

Route::post('/proveri', 'VezbaController@proveri');

Route::post('/store', 'PitanjaController@store');

Route::post('/dodaj_pitanje', 'PitanjaController@create');

Route::post('/ponovo_provera', 'OdgovoriController@ponovo_provera');
