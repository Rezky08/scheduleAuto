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
Route::post('/matkul/add', 'views\MatkulViewController@add');
Route::post('/matkul/update/{kode_matkul}', 'views\MatkulViewController@update');
Route::post('/matkul/delete/{kode_matkul}', 'views\MatkulViewController@delete');


Route::get('/program_studi', 'views\ProgramStudiViewController@index');
Route::post('/program_studi/add', 'views\ProgramStudiViewController@add');
Route::post('/program_studi/update/{kode_prodi}', 'views\ProgramStudiViewController@update');
Route::post('/program_studi/delete/{kode_prodi}', 'views\ProgramStudiViewController@delete');

Route::get('/ruang', 'views\RuangViewController@index');
Route::post('/ruang/add', 'views\RuangViewController@add');
Route::post('/ruang/update/{id}', 'views\RuangViewController@update');
Route::post('/ruang/delete/{id}', 'views\RuangViewController@delete');

Route::get('/hari', 'views\hariViewController@index');
Route::post('/hari/add', 'views\hariViewController@add');
Route::post('/hari/update/{id}', 'views\hariViewController@update');
Route::post('/hari/delete/{id}', 'views\hariViewController@delete');

Route::get('/jam', 'views\JamViewController@index');
Route::post('/jam/add', 'views\JamViewController@add');
Route::post('/jam/update/{id}', 'views\JamViewController@update');
Route::post('/jam/delete/{id}', 'views\JamViewController@delete');

Route::get('/jadwal', function () {
    return view('jadwal');
});
