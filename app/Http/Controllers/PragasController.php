<?php

namespace App\Http\Controllers;

use App\Models\PragasModel;
use Illuminate\Http\Request;

class PragasController extends Controller
{
    public function pragas(){
        return response()->json(PragasModel::get(),200);
    }

    public function pragasbyid($id){
        return response()->json(PragasModel::find($id),200);
    }

    public function addpraga(Request $request) {
        $praga = PragasModel::create($request->all());
        return response()->json($praga, 201);
    }

    public function updatepraga(Request $request, $id) {

        $pragasModel = PragasModel::find($id);
        $pragasModel->update($request->all());
        return response()->json($pragasModel, 200);
    }
}
