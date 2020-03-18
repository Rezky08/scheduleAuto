<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/matkul', 'MatakuliahController@store');
Route::get('/matkul', 'MatakuliahController@index');
Route::put('/matkul', 'MatakuliahController@update');
Route::delete('/matkul', 'MatakuliahController@destroy');

Route::post('/program_studi', 'ProgramStudiController@store');
Route::get('/program_studi', 'ProgramStudiController@index');
Route::put('/program_studi', 'ProgramStudiController@update');
Route::delete('/program_studi', 'ProgramStudiController@destroy');

Route::post('/ruang', 'ruangController@store');
Route::get('/ruang', 'ruangController@index');
Route::put('/ruang', 'ruangController@update');
Route::delete('/ruang', 'ruangController@destroy');
