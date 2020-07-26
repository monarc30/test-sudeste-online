<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdutosModel;
use Illuminate\Support\Facades\Validator;

/**
 * @group Gerencia Produtos
 *
 * APIs para gerenciamento de produtos
 */

class Produtos extends Controller
{
    /**
     * Exibe a lista de produtos.
     *
     * @authenticated
     *
     * @response {
     *  "name": "exemplo produto"
     * }
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(ProdutosModel::get(),200);
    }

    /**
     * Show the form for creating a new produtos.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Armazena novos produtos.
     * @bodyParam name string com mínimo 4 e maximo 100 caracteres
     *
     * @authenticated
     *
     * @response {
     *  "id": 1,
     *  "name": "produto6",
     *  "created_at": "2020-07-25T21:15:09.000000Z",
     *  "updated_at": "2020-07-26T01:58:47.000000Z"
     * }
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:4|max:100',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $produtosModel = ProdutosModel::create($request->all());
        return response()->json($produtosModel, 201);
    }

    /**
     * Exibe um produto específico
     *
     * @authenticated
     *
     * @response {
     *  "id": 1,
     *  "name": "produto6",
     *  "created_at": "2020-07-25T21:15:09.000000Z",
     *  "updated_at": "2020-07-26T01:58:47.000000Z"
     * }
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produtosModel = ProdutosModel::find($id);
        if (is_null($produtosModel)) {
            return MensagemController::not_found();
        }
        return response()->json($produtosModel,200);
    }

    /**
     * Show the form for editing the specified produtos.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Altera um produto específico.
     * @bodyParam name string com mínimo 4 e maximo 100 caracteres
     *
     * @authenticated
     *
     * @response {
     *  "id": 1,
     *  "name": "produto6",
     *  "created_at": "2020-07-25T21:15:09.000000Z",
     *  "updated_at": "2020-07-26T01:58:47.000000Z"
     * }
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|min:4|max:100',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $produtosModel = ProdutosModel::find($id);
        if (is_null($produtosModel)) {
            return MensagemController::not_found();
        }
        $produtosModel->update($request->all());
        return response()->json($produtosModel, 200);
    }

    /**
     * Remove um produto específico.
     *
     * @authenticated
     *
     * @response {
     *  1,
     * }
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produtosModel = ProdutosModel::find($id);
        if (is_null($produtosModel)) {
            return MensagemController::not_found();
        }
        $produtosModel->delete();
        return response()->json(null, 204);
    }
}
