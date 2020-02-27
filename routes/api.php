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

// buat insert
Route::post('/program_studi', 'ProgramStudiController@store');
// buat ngambil semua data nya
Route::get('/program_studi', 'ProgramStudiController@index');
// buat ngambil satu matkul
Route::get('/program_studi/{kode_prodi}', 'ProgramStudiController@show');
// buat ngedit satu matkul
Route::put('/program_studi/{kode_prodi}', 'ProgramStudiController@update');
// buat ngapus satu matkul
Route::delete('/program_studi/{kode_prodi}', 'ProgramStudiController@destroy');