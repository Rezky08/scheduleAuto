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
// Route::post('/matkul', 'MatakuliahController@store');

Route::get('/matkul', 'MatkulViewController@index');
Route::post('/matkul/add', 'MatkulViewController@tambah');

Route::get('/program_studi', 'ProgramStudiViewController@index');
Route::post('/program_studi/add', 'ProgramStudiViewController@tambah');

Route::get('/ruang', 'RuangViewController@index');
Route::post('/ruang/add', 'RuangViewController@tambah');

Route::get('/hari', 'hariViewController@index');
Route::post('/hari/add', 'hariViewController@tambah');

Route::get('/jam', 'JamViewController@index');
Route::post('/jam/add', 'JamViewController@tambah');
