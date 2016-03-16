<?php

use App\Task;
use Illuminate\Http\Request;

Route::group(['middleware' => 'web'], function () {


    //Enseña la pagina inicial
    Route::get('/', function () {
        return view('clients');
    });

    /**
     * Add New Task
     */
    Route::post('/client', function (Request $request) {
        //
    });

    /**
     * Delete Task
     */
    Route::delete('/task/{task}', function (Task $task) {
        //
    });
});
