<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CulturasModel;
use Illuminate\Support\Facades\Validator;

/**
 * @group Gerencia Culturas
 *
 * APIs para gerenciamento de Culturas
 */

class Culturas extends Controller
{
    /**
     * Exibe a lista de culturas.
     *
     * @authenticated
     *
     * @response {
     *  "name": "cultura1"
     * }
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(CulturasModel::get(),200);
    }

    /**
     * Show the form for creating a new culturas.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Armazena novas Culturas.
     * @bodyParam name string com mínimo 4 e maximo 100 caracteres
     *
     * @authenticated
     *
     * @response {
     *  "id": 1,
     *  "name": "cultura1",
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
        $culturasModel = CulturasModel::create($request->all());
        return response()->json($culturasModel, 201);
    }

    /**
     * Exibe uma Cultura específico
     *
     * @authenticated
     *
     * @response {
     *  "id": 1,
     *  "name": "cultura6",
     *  "created_at": "2020-07-25T21:15:09.000000Z",
     *  "updated_at": "2020-07-26T01:58:47.000000Z"
     * }
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $culturasModel = CulturasModel::find($id);
        if (is_null($culturasModel)) {
            return MensagemController::not_found();
        }
        return response()->json($culturasModel,200);
    }

    /**
     * Show the form for editing the specified culturas.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Altera uma cultura específica.
     * @bodyParam name string com mínimo 4 e maximo 100 caracteres
     *
     * @authenticated
     *
     * @response {
     *  "id": 1,
     *  "name": "cultura6",
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
        $culturasModel = CulturasModel::find($id);
        if (is_null($culturasModel)) {
            return MensagemController::not_found();
        }
        $culturasModel->update($request->all());
        return response()->json($culturasModel, 200);
    }

    /**
     * Remove uma cultura específico.
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
        $culturasModel = CulturasModel::find($id);
        if (is_null($culturasModel)) {
            return MensagemController::not_found();
        }
        $culturasModel->delete();
        return response()->json(null, 204);
    }
}
