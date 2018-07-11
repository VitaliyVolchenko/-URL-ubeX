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

Route::get('/parser', 'ParserController@index')->name('index');
Route::post('/parser', 'ParserController@store')->name('store');
Route::get('/parser/video', 'ParserController@show')->name('show');
Route::get('/parser/video/{id}', 'ParserController@getVideo')->name('video')->where('id', '[0-9]+');
Route::post('/parser/video', 'ParserController@delete')->name('delete');