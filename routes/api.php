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
Route::post('/jam', 'JamController@store');
Route::get('/jam', 'JamController@index');
Route::get('/jam/{kode_jam}', 'JamController@show');
Route::put('/jam/{kode_jam}', 'JamController@update');
Route::delete('/jam/{kode_jam}', 'JamController@destroy');
