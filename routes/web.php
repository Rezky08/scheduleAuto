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
// Route::post('/matkul', 'views\MatakuliahController@store');

Route::get('/matkul', 'views\MatkulViewController@index');
Route::post('/matkul/add', 'views\MatkulViewController@tambah');

Route::get('/program_studi', 'views\ProgramStudiViewController@index');
Route::post('/program_studi/add', 'views\ProgramStudiViewController@tambah');

Route::get('/ruang', 'views\RuangViewController@index');
Route::post('/ruang/add', 'views\RuangViewController@tambah');

Route::get('/hari', 'views\hariViewController@index');
Route::post('/hari/add', 'views\hariViewController@tambah');

Route::get('/jam', 'views\JamViewController@index');
Route::post('/jam/add', 'views\JamViewController@tambah');
