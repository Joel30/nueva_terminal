<?php

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => 'auth'], function () {

    Route::get('/personal', 'PersonalController@index')->name('personal.index');
    Route::get('personal/nuevo', 'PersonalController@create')->name('personal.nuevo');
    Route::post('personal', 'PersonalController@store')->name('personal.guardar');
    Route::get('personal/{id}/editar', 'PersonalController@edit')->name('personal.editar');
    Route::put('personal/{personal}', 'PersonalController@update')->name('personal.actualizar');
    Route::delete('personal/{personal}', 'PersonalController@destroy')->name('personal.eliminar');

    Route::get('/usuario', 'UserController@index')->name('usuario.index');
    Route::get('usuario/nuevo', 'UserController@create')->name('usuario.nuevo');
    Route::post('usuario', 'UserController@store')->name('usuario.guardar');
    Route::get('usuario/{id}/editar', 'UserController@edit')->name('usuario.editar');
    Route::put('usuario/{usuario}', 'UserController@update')->name('usuario.actualizar');
    Route::delete('usuario/{usuario}', 'UserController@destroy')->name('usuario.eliminar');

    Route::get('bus', 'BusController@index')->name('bus.index');
    Route::get('bus/nuevo', 'BusController@create')->name('bus.nuevo');
    Route::post('bus', 'BusController@store')->name('bus.guardar');
    Route::get('bus/{id}/editar', 'BusController@edit')->name('bus.editar');
    Route::put('bus/{bus}', 'BusController@update')->name('bus.actualizar');
    Route::delete('bus/{bus}', 'BusController@destroy')->name('bus.eliminar');

    Route::get('carril', 'CarrilController@index')->name('carril.index');
    Route::get('carril/nuevo', 'CarrilController@create')->name('carril.nuevo');
    Route::post('carril', 'CarrilController@store')->name('carril.guardar');
    Route::get('carril/{id}/editar', 'CarrilController@edit')->name('carril.editar');
    Route::put('carril/{carril}', 'CarrilController@update')->name('carril.actualizar');
    Route::delete('carril/{carril}', 'CarrilController@destroy')->name('carril.eliminar');

    Route::get('departamento', 'DepartamentoController@index')->name('departamento.index');
    Route::get('departamento/nuevo', 'DepartamentoController@create')->name('departamento.nuevo');
    Route::post('departamento', 'DepartamentoController@store')->name('departamento.guardar');
    Route::get('departamento/{id}/editar', 'DepartamentoController@edit')->name('departamento.editar');
    Route::put('departamento/{departamento}', 'DepartamentoController@update')->name('departamento.actualizar');
    Route::delete('departamento/{departamento}', 'DepartamentoController@destroy')->name('departamento.eliminar');

    Route::get('empresa', 'EmpresaController@index')->name('empresa.index');
    Route::get('empresa/nuevo', 'EmpresaController@create')->name('empresa.nuevo');
    Route::post('empresa', 'EmpresaController@store')->name('empresa.guardar');
    Route::get('empresa/{id}/editar', 'EmpresaController@edit')->name('empresa.editar');
    Route::put('empresa/{empresa}', 'EmpresaController@update')->name('empresa.actualizar');
    Route::delete('empresa/{empresa}', 'EmpresaController@destroy')->name('empresa.eliminar');

    Route::get('transporte', 'TransporteController@index')->name('transporte.index');
    Route::get('transporte/nuevo', 'TransporteController@create')->name('transporte.nuevo');
    Route::post('transporte', 'TransporteController@store')->name('transporte.guardar');
    Route::get('transporte/{id}/editar', 'TransporteController@edit')->name('transporte.editar');
    Route::put('transporte/{transporte}', 'TransporteController@update')->name('transporte.actualizar');
    Route::delete('transporte/{transporte}', 'TransporteController@destroy')->name('transporte.eliminar');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
