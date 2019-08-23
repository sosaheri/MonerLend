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
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');


Route::get('/estadisticasRegistrados', 'EstadisticasController@registrados');
Route::get('/estadisticasRanking', 'EstadisticasController@ranking');


Route::get('/profile', 'UserProfileController@show')->middleware('auth')->name('profile.show');
Route::patch('/profile', 'UserProfileController@update')->middleware('auth')->name('profile.update');

Route::get('/referral-link', 'HomeController@referral');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

/*
|--------------------------------------------------------------------------
| Rutas con permisologia
|--------------------------------------------------------------------------
*/
Route::get('/verify-user/{code}', 'Auth\RegisterController@activateUser')->name('activate.user');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    
});

/*
|--------------------------------------------------------------------------
| Transacciones con permisologia
|--------------------------------------------------------------------------
*/

Route::get('depositos', function () {
    return view('transacciones.depositos');
});

//Route::get('/cart','CartController@show');
//Route::get('/cart/{id}/add','CartController@add');
//Route::get('/cart/destroy','CartController@destroy');

//Route::get('/transacciones.depositos','CartController@getCheckout');
Route::post('depositos','CartController@CoinGate');
Route::post('/cart/callback', 'CartController@callback');
Route::get('/cart/callback', 'CartController@callback');
Route::get('/myorders', 'CartController@myOrders');