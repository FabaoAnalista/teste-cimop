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

//rotas definidas no grupo api com prefixo da versao (v1) para os recursos de veiculos e motoristas,

    Route::group(array('prefix' => 'v1'), function()
    {
        Route::get('/', function () {
          return response()->json(['message' => 'Motoristas API', 'status' => 'Connected']);;
      });
    //Route::resource('motoristas', 'MotoristasController'); //Implementa todas as rotas para motorista (get,post,put,delete)
    //Route::resource('veiculos', 'VeiculosController'); //Implementa todas as rotas para motorista (get,post,put,delete)
    Route::post('motoristas', 'MotoristasController@store');
    Route::get('motoristas', 'MotoristasController@index');
    
});

//redireciona para index de api
Route::get('/', function () {
    return redirect('api');
});