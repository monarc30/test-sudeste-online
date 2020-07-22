<?php

namespace App\Http\Controllers;

use App\Models\PragasModel;
use Illuminate\Http\Request;
use Validator;

class PragasController extends Controller
{
    public function pragas(){
        return response()->json(PragasModel::get(),200);
    }

    public function pragasbyid($id){

        $PragasModel = PragasModel::find($id);
        if (is_null($PragasModel)) {
            return MensagemController::not_found();
        }
        return response()->json(PragasModel::find($id),200);
    }

    public function addpraga(Request $request) {

        $rules = [
            'name' => 'required|max:100',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $pragasModel = PragasModel::create($request->all());
        return response()->json($pragasModel, 201);
    }

    public function updatepraga(Request $request, $id) {
        $pragasModel = PragasModel::find($id);
        if (is_null($pragasModel)) {
            return MensagemController::not_found();
        }
        $pragasModel->update($request->all());
        return response()->json($pragasModel, 200);
    }

    public function deletepraga($id) {
        $pragasModel = PragasModel::find($id);
        if (is_null($pragasModel)) {
            return MensagemController::not_found();
        }
        $pragasModel->delete();
        return response()->json(null, 204);
    }

}
