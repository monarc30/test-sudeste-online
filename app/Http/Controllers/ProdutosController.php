<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProdutosModel;

class ProdutosController extends Controller
{
    public function products(){
        return response()->json(ProdutosModel::get(),200);
    }

    public function productsbyid($id){
        return response()->json(ProdutosModel::find($id),200);
    }

    public function addproduto(Request $request) {
        $produto = ProdutosModel::create($request->all());
        return response()->json($produto, 201);
    }

    public function updateproduto(Request $request, $id) {

        $produtosModel = ProdutosModel::find($id);
        $produtosModel->update($request->all());
        return response()->json($produtosModel, 200);
    }
}
