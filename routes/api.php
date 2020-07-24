<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/*

rotas criadas manualmente

Route::get('produtos', 'ProdutosController@products');
Route::get('produtos/{id}', 'ProdutosController@productsbyid');
Route::post('produtos', 'ProdutosController@addproduto');
Route::put('produtos/{id}', 'ProdutosController@updateproduto');
Route::delete('produtos/{id}', 'ProdutosController@deleteproduto');


Route::get('culturas/{id}', 'CulturasController@culturasbyid');
Route::get('culturas', 'CulturasController@culturas');
Route::post('culturas', 'CulturasController@addcultura');
Route::put('culturas/{id}', 'CulturasController@updatecultura');
Route::delete('culturas/{id}', 'CulturasController@deletecultura');

Route::get('pragas', 'PragasController@pragas');
Route::get('pragas/{id}', 'PragasController@pragasbyid');
Route::post('pragas', 'PragasController@addpraga');
Route::put('pragas/{id}', 'PragasController@updatepraga');
Route::delete('pragas/{id}', 'PragasController@deletepraga');

*/

Route::group(['middleware' => ['guest:api']], function () {
    Route::get('/guest', function(){
        return 'Olá mundo API';
    });

    Route::post('login', 'LoginController@login');
});

Route::group(['middleware' => 'auth:api'], function(){

    Route::apiResource('produtos', 'Produtos');
    Route::apiResource('culturas', 'Culturas');
    Route::apiResource('pragas', 'Pragas');

    //NAO ESQUECER DE VER O CADASTRO DAS DOSAGENS

    Route::get('dosagensprodutos/{dosagensmodel}', 'DosagensController@show');

});



