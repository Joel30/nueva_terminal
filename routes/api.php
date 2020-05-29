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

Route::get('bus/datatable', 'BusController@data_index')->name('bus.data_index');

Route::get('transporte/datatable', 'TransporteController@data_index')->name('transporte.data_index');

