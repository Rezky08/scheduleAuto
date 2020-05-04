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
    return redirect('/matkul');
});

Route::get('/matkul', 'views\MatkulViewController@index');
Route::post('/matkul/add', 'views\MatkulViewController@add');
Route::post('/matkul/update/{id}', 'views\MatkulViewController@update');
Route::post('/matkul/delete/{id}', 'views\MatkulViewController@delete');


Route::get('/program_studi', 'views\ProgramStudiViewController@index');
Route::post('/program_studi/add', 'views\ProgramStudiViewController@add');
Route::post('/program_studi/update/{id}', 'views\ProgramStudiViewController@update');
Route::post('/program_studi/delete/{id}', 'views\ProgramStudiViewController@delete');

Route::get('/ruang', 'views\RuangViewController@index');
Route::post('/ruang/add', 'views\RuangViewController@add');
Route::post('/ruang/update/{id}', 'views\RuangViewController@update');
Route::post('/ruang/delete/{id}', 'views\RuangViewController@delete');

Route::get('/hari', 'views\HariViewController@index');
Route::post('/hari/add', 'views\HariViewController@add');
Route::post('/hari/update/{id}', 'views\HariViewController@update');
Route::post('/hari/delete/{id}', 'views\HariViewController@delete');

Route::get('/sesi', 'views\SesiViewController@index');
Route::post('/sesi/add', 'views\SesiViewController@add');
Route::post('/sesi/update/{id}', 'views\SesiViewController@update');
Route::post('/sesi/delete/{id}', 'views\SesiViewController@delete');

Route::get('/kelompok_dosen/detail', 'views\KelompokDosenViewController@index');
Route::post('/kelompok_dosen/detail/add', 'views\KelompokDosenViewController@add');
Route::put('/kelompok_dosen/detail/update/{id}', 'views\KelompokDosenViewController@update');
Route::delete('/kelompok_dosen/detail/delete/{id}', 'views\KelompokDosenViewController@delete');
