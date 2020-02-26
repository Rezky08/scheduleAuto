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
Route::get('/matkul/{kode_matkul}', 'MatakuliahController@show');
Route::put('/matkul/{kode_matkul}', 'MatakuliahController@update');
