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
Route::group(['middleware' => 'web'], function (){
    Route::auth();
    Route::get('/home', 'HomeController@index');
});

Route::get('/logout', 'Auth\AuthController@getLogout');
/**
 * Quotes route groupe
 */
Route::get('/quote', 'QuoteController@index');


Route::get('/home', 'HomeController@index');
Route::get('/tasks','TaskController@index')->name('tasks');
Route::post('/task', 'TaskController@store');
Route::delete('/task/{task}', 'TaskController@destroy');
Route::get('/task/view/{task}', 'TaskController@viewTask');
Route::patch('/task/view/{task}/update', 'TaskController@updateTask');

Route::auth();

Route::get('/home', 'HomeController@index');
