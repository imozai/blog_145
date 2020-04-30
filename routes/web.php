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

/*
Route::get('/', function () {
	$headers = 'Index Page';
    return view('index', ['headers' => $headers]);
});

Route::get('/features', function () {
	$headers = 'Features Page';
    return view('features', ['headers' => $headers]);
});

Route::get('/pricing', function () {
	$headers = 'Pricing Page';
    return view('pricing', ['headers' => $headers]);
});
*/

Route::get('/', 'PageController@index');
Route::get('/features', 'PageController@features');
Route::get('/pricing', 'PageController@pricing');

Route::get('/mahasiswa', 'MahasiswaController@index');

Route::get('/student', 'StudentsController@index');
Route::get('/student/{student}', 'StudentsController@show');
Route::post('/create','StudentsController@create');
Route::delete('/student/{student}', 'StudentsController@destroy');
Route::post('/update/{student}','StudentsController@update');