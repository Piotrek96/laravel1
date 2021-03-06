<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/','UserController@index');
Route::get('/create', 'UserController@create');
Route::any('/avaibility', 'UserController@avaibility');
Route::any('/store', 'UserController@store');
Route::any('/form/{action}', 'UserController@form');
Route::get('/addGroup/{id}', 'UserController@groupForm');
Route::post('/addGroup/{id}', 'UserController@addGroup');
Route::post('/login', 'UserController@login');


