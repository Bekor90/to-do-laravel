<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/auth', 'LoginController@authenticate');

//Routes User
//Route::resource('/user', 'UserController');
Route::get('/user/last', 'UserController@findLastId');
Route::get('/user/email/{id}', 'UserController@findeEmail'); 
Route::get('/user', 'UserController@index');
Route::get('/user/{id}', 'UserController@show');
Route::post('/user', 'UserController@store');
Route::put('/user/{id}', 'UserController@update');
Route::delete('/user/{id}', 'UserController@destroy');

//Routes Task
//Route::resource('/task', 'TaskController');
Route::get('/task/last', 'TaskController@findLastId');
Route::get('/task', 'TaskController@index');
Route::get('/task/{id}', 'TaskController@show');
Route::post('/task', 'TaskController@store');
Route::put('/task/{id}', 'TaskController@update');
Route::delete('/task/{id}', 'TaskController@destroy');



