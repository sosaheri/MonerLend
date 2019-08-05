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

/*
|--------------------------------------------------------------------------
| Rutas estaticas para la web
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('index');
});

Route::get('tyc', function () {
    return view('toc');
});

Route::get('privacidad', function () {
    return view('privacy');
});

/*
|--------------------------------------------------------------------------
| Rutas para aplicación
|--------------------------------------------------------------------------
*/

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

/*
|--------------------------------------------------------------------------
| Rutas estaticas para la web
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    //Route::resource('products','ProductController');
});