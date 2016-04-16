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
    Route::get('/', 'MainController@index');
    Route::get('/create', 'MainController@create');
    Route::post('/create', 'MainController@store');
    Route::get('/cp/edit/{message}', 'MainController@edit');
    Route::post('/cp/edit/{message}', 'MainController@update');
    Route::get('/cp', 'MainController@controlPanel');
    Route::get('/cp/delete/{id}', 'MainController@delete');
    Route::auth();
    Route::get('/reveal', 'RevealController@index');

    Route::get('/{message}', 'MainController@view');
});

