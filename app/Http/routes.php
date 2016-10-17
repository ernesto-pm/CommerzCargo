<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

// New orders routes
Route::get('/crearOrden', 'HomeController@createOrder');
Route::post('/postCrearOrden', 'HomeController@postCreateOrder');

Route::post('/postCrearConfirmacion','HomeController@postCreateConfirmation');
Route::post('/postConfirmar','HomeController@postConfirm');
Route::get('/verOrden/{id}','HomeController@viewOrder');
Route::get('/verConfirmacion/{id}','HomeController@viewConfirmation');
Route::get('/registerCarrier','FrontendController@registerCarrier');

Route::post('/postShipment','HomeController@postShipment');

Route::group(['middleware'=>'cors','prefix' => 'api/v1'], function(){
    Route::resource('authenticate', 'AuthenticateController',['only'=>['index']]);
    Route::post('authenticate','AuthenticateController@authenticate');
    Route::get('authenticate/user', 'AuthenticateController@getAuthenticatedUser');
});

Route::group(['middleware' => 'cors', 'prefix' => 'api/v1'], function(){
    Route::resource('orderconfirmations', 'OrderconfirmationsController');
});




