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

Route::get('/', 'App\Http\Controllers\DefaultController@index')->name('index');

Route::post('/', 'App\Http\Controllers\DefaultController@filter')->name('filter');
Route::post('/save', 'App\Http\Controllers\DefaultController@save')->name('save');