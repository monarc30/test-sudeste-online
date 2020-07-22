<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CulturasModel;
use Validator;

class CulturasController extends Controller
{
    public function culturas(){
        return response()->json(CulturasModel::get(),200);
    }

    public function culturasbyid($id){

        $culturasModel = CulturasModel::find($id);
        if (is_null($culturasModel)) {
            return MensagemController::not_found();
        }
        return response()->json(CulturasModel::find($id),200);
    }

    public function addcultura(Request $request) {

        $rules = [
            'name' => 'required|max:100',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $culturasModel = CulturasModel::create($request->all());
        return response()->json($culturasModel, 201);
    }

    public function updatecultura(Request $request, $id) {
        $culturasModel = CulturasModel::find($id);
        if (is_null($culturasModel)) {
            return MensagemController::not_found();
        }
        $culturasModel->update($request->all());
        return response()->json($culturasModel, 200);
    }

    public function deletecultura($id) {
        $culturasModel = CulturasModel::find($id);
        if (is_null($culturasModel)) {
            return MensagemController::not_found();
        }
        $culturasModel->delete();
        return response()->json(null, 204);
    }
}
