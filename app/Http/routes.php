<?php

use App\Task;
use Illuminate\Http\Request;

Route::group(['middleware' => 'web'], function () {
    Route::get('/',[
        'as' => 'home',
        'uses' => 'PagesController@home'
    ]);

    Route::resource('clients','ClientsController');
});
