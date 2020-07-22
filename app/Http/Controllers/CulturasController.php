<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CulturasModel;
use App\Http\Controllers\Controller;

class CulturasController extends Controller
{
    public function culturas(){
        return response()->json(CulturasModel::get(),200);
    }

    public function culturasbyid($id){
        return response()->json(CulturasModel::find($id),200);
    }

    public function addcultura(Request $request) {
        $cultura = CulturasModel::create($request->all());
        return response()->json($cultura, 201);
    }

    public function updatecultura(Request $request, $id) {

        $culturasModel = CulturasModel::find($id);
        $culturasModel->update($request->all());
        return response()->json($culturasModel, 200);
    }
}
