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

Route::get('/jam', 'views\JamViewController@index');
Route::post('/jam/add', 'views\JamViewController@add');
Route::post('/jam/update/{id}', 'views\JamViewController@update');
Route::post('/jam/delete/{id}', 'views\JamViewController@delete');

Route::get('/jadwal', function () {
    return view('jadwal');
});
