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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', 'Auth\LoginController@auth');
Route::post('/login', 'Auth\LoginController@valid');

Route::get('/project/list', 'ProjectController@index');

Route::get('/project/add', 'ProjectController@add');
Route::post('/project/add', 'ProjectController@store');

Route::get('/project/update', 'ProjectController@update');
Route::post('/project/update', 'ProjectController@send');

Route::get('/project/delete/{id}', 'ProjectController@delete');

Route::get('/main', 'ProjectController@main');

Route::get('/project/list/{col}/{dir}', 'ProjectController@sort');
