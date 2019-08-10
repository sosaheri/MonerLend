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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');;
Route::get('profile', 'UserProfileController@show')->middleware('auth')->name('profile.show');
Route::patch('profile', 'UserProfileController@update')->middleware('auth')->name('profile.update');

Route::get('/cookie', function () {
    return Cookie::get('referral');
});
Route::get('/referral-link', 'HomeController@referral');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('countries', 'RegisterController@countries');

/*
|--------------------------------------------------------------------------
| Rutas con permisologia
|--------------------------------------------------------------------------
*/
Route::get('/verify-user/{code}', 'Auth\RegisterController@activateUser')->name('activate.user');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    //Route::resource('products','ProductController');
});