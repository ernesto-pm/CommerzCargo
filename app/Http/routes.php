<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('/', [
        'as' => 'home',
        'uses' => 'PagesController@home'
    ]);



    Route::resource('applications','ApplicationsController');
    
    Route::resource('clients','ClientsController');


    Route::resource('carriers', 'CarriersController');


    Route::resource('trucks', 'TrucksController');


    Route::resource('sales', 'SalesController');


    Route::resource('orders', 'OrdersController');

    Route::get('pages/login','PagesController@login') -> name('login');

    Route::get('clients/successful','ClientsController@successful') -> name('successful');

    Route::get('/dashboard',[
        'uses' => 'ClientsController@getDashboard',
        'as' => 'dashboard'
    ]);

    Route::post('/signIn',[
        'uses' => 'ClientsController@signIn',
        'as' => 'signin'
    ]);


    /*Route::resource('clients/successful', 'ClientsController@successful',function(){
        return 'hola';
    }) -> name('clients.successful');
    */
    //Route::resource('successful', 'ClientsController');

});



