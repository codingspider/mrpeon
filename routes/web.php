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


Route::get('/testsession', 'TestController@index');

Route::get('/get_details/{id}', 'RequestQuantity@get');


Route::post('/merchant/added/{id}', 'RequestQuantity@insert');
