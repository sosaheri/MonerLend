<?php

use Illuminate\Support\Facades\Notification;
use App\Notifications\UserRegisteredSuccessfully;

use App\User;

// Route::get('/test-mail', function (){
//     Notification::route('mail', 'sosaheriberto@monerlend')->notify(new UserRegisteredSuccessfully( Auth::user() ) );
//     return 'Sent';
// });

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


Auth::routes();

/*
|--------------------------------------------------------------------------
| Rutas con permisologia
|--------------------------------------------------------------------------
*/
Route::get('/verify-user/{code}', 'Auth\RegisterController@activateUser')->name('activate.user');



Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    
    Route::get('depositos', function () {
        return view('transacciones.depositos');
    });

    Route::get('prestamos', function () {
        return view('transacciones.prestamos');
    });

    Route::get('/listadoFinanciamiento', 'PrestamosController@listadoFinanciamiento')->name('listadoFinanciamiento');

    Route::get('/financiar/{id}','PrestamosController@financiar');



//Route::get('/cart','CartController@show');
//Route::get('/cart/{id}/add','CartController@add');
//Route::get('/cart/destroy','CartController@destroy');

//Route::get('/transacciones.depositos','CartController@getCheckout');
Route::post('prestamos','PrestamosController@prestamos');
Route::post('aprobarAhorrar','CartController@aprobarAhorrar');
Route::get('ahorrar/{amount}/{months}/{ui}/{or}/{type}/{currency}/{u}/{time}/','CartController@ahorrar');
Route::post('financiamiento','PrestamosController@financiamiento');
Route::post('depositos','CartController@CoinGate');

//Route::post('depositos','CartController@CoinBase');
Route::get('coinbase-webhook','CartController@callbackCB');

Route::post('/cart/callback', 'CartController@callback');
Route::get('/cart/callback', 'CartController@callback');
Route::get('/myorders', 'CartController@myOrders');


/*
|--------------------------------------------------------------------------
| Rutas para aplicación
|--------------------------------------------------------------------------
*/

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/estadisticasRegistrados', 'EstadisticasController@registrados');
Route::get('/estadisticasRanking', 'EstadisticasController@ranking');
Route::get('/estadisticasTransacciones', 'EstadisticasController@transacciones');
Route::get('/misTransacciones', 'EstadisticasController@misTransacciones')->name('estadisticas.misTransacciones');
Route::get('/ultimosDepositos', 'EstadisticasController@ultimosDepositos');

Route::get('/profile', 'UserProfileController@show')->middleware('auth')->name('profile.show');
Route::get('/amigos', 'UserProfileController@amigos')->middleware('auth')->name('profile.amigos');
Route::patch('/profile', 'UserProfileController@update')->middleware('auth')->name('profile.update');

Route::get('/referral-link', 'HomeController@referral');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');



});









