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

Route::get('produtos', 'ProdutosController@products');
Route::get('culturas', 'CulturasController@culturas');
Route::get('pragas', 'PragasController@pragas');

Route::get('produtos/{id}', 'ProdutosController@productsbyid');
Route::get('culturas/{id}', 'CulturasController@culturasbyid');
Route::get('pragas/{id}', 'PragasController@pragasbyid');


Route::post('produtos', 'ProdutosController@addproduto');
Route::post('culturas', 'CulturasController@addcultura');
Route::post('pragas', 'PragasController@addpraga');

Route::put('produtos/{produtos}', 'ProdutosController@updateproduto');
Route::put('culturas/{culturas}', 'CulturasController@updatecultura');
Route::put('pragas/{pragas}', 'PragasController@updatepraga');



//NAO ESQUECER DE VER O CADASTRO DAS DOSAGENS

Route::get('dosagensprodutos/{dosagensmodel}', 'DosagensController@show');
