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

Route::get('todos', 'TodosController@index');

Route::get('todos/{id}', 'TodosController@show');

Route::get('new-todos', 'TodosController@create');

Route::post('store-todo', 'TodosController@store');

Route::get('todos/{id}/edit', 'TodosController@edit');

Route::post('todos/{id}/update-todos', 'TodosController@update');

Route::get('todos/{id}/delete', 'TodosController@delete');

Route::get('todos/{id}/complete', 'TodosController@complete');
