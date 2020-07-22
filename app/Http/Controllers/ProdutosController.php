<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdutosModel;
use Validator;

class ProdutosController extends Controller
{
    public function products(){
        return response()->json(ProdutosModel::get(),200);
    }

    public function productsbyid($id){

        $produtosModel = ProdutosModel::find($id);
        if (is_null($produtosModel)) {
            return MensagemController::not_found();
        }
        return response()->json($produtosModel,200);
    }

    public function addproduto(Request $request) {

        $rules = [
            'name' => 'required|max:100',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $produtosModel = ProdutosModel::create($request->all());
        return response()->json($produtosModel, 201);
    }

    public function updateproduto(Request $request, $id) {
        $produtosModel = ProdutosModel::find($id);
        if (is_null($produtosModel)) {
            return MensagemController::not_found();
        }
        $produtosModel->update($request->all());
        return response()->json($produtosModel, 200);
    }

    public function deleteproduto($id) {
        $produtosModel = ProdutosModel::find($id);
        if (is_null($produtosModel)) {
            return MensagemController::not_found();
        }
        $produtosModel->delete();
        return response()->json(null, 204);
    }

}
