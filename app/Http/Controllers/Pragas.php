<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PragasModel;
use Illuminate\Support\Facades\Validator;

/**
 * @group Gerencia Pragas
 *
 * APIs para gerenciamento de pragas
 */

class Pragas extends Controller
{
    /**
     * Exibe a lista de pragas.
     *
     * @authenticated
     *
     * @response {
     *  "name": "praga1"
     * }
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(PragasModel::get(),200);
    }

    /**
     * Show the form for creating a new pragas.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Armazena novas pragas.
     * @bodyParam name string com mínimo 4 e maximo 100 caracteres
     *
     * @authenticated
     *
     * @response {
     *  "id": 1,
     *  "name": "praga3",
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
        $pragasModel = PragasModel::create($request->all());
        return response()->json($pragasModel, 201);
    }

    /**
     * Exibe uma praga específica
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
        $PragasModel = PragasModel::find($id);
        if (is_null($PragasModel)) {
            return MensagemController::not_found();
        }
        return response()->json($PragasModel,200);
    }

    /**
     * Show the form for editing the specified pragas.
     *
     * @authenticated
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Altera uma praga específica.
     * @bodyParam name string com mínimo 4 e maximo 100 caracteres
     *
     * @authenticated
     *
     * @response {
     *  "id": 1,
     *  "name": "praga7",
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
        $pragasModel = PragasModel::find($id);
        if (is_null($pragasModel)) {
            return MensagemController::not_found();
        }
        $pragasModel->update($request->all());
        return response()->json($pragasModel, 200);
    }

    /**
     * Remove uma praga específica.
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
        $pragasModel = PragasModel::find($id);
        if (is_null($pragasModel)) {
            return MensagemController::not_found();
        }
        $pragasModel->delete();
        return response()->json(null, 204);
    }
}
