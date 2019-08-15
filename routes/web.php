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

Route::get('/', 'MedicoController@index');
Route::get('/form', 'MedicoController@create');
Route::post('/', 'MedicoController@store');
Route::get('/{id}/edit', 'MedicoController@edit');
Route::put('/{id}', 'MedicoController@update');
Route::delete('/{id}', 'MedicoController@destroy');
Route::put('/restore/{id}', 'MedicoController@restore');

