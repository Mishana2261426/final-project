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
Route::get('/listProjects', 'ProjectController@index');
Route::get('/addProjects', 'ProjectController@add');
Route::post('/addProjects', 'ProjectController@store');
Route::get('/main', 'ProjectController@main');

//safsfsdf
