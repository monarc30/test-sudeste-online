<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DosagensModel;
use Illuminate\Support\Facades\Validator;

/**
 * @group Gerencia Dosagens
 *
 * APIs para gerenciamento de dosagens
 */

class Dosagens extends Controller
{
    /**
     * Exibe a lista de dosagens.
     *
     * @authenticated
     *
     * @response {
     *  "id": 12,
     *    "idcultura": 1,
     *    "idpraga": 3,
     *    "dosagem": "dosagem4",
     *    "created_at": "2020-07-26T22:49:45.000000Z",
     *    "updated_at": "2020-07-26T22:49:45.000000Z",
     *    "produtos": {
     *        "id": 2,
     *        "name": "produto9",
     *        "created_at": "2020-07-26T22:29:44.000000Z",
     *        "updated_at": "2020-07-26T22:29:44.000000Z"
     *    },
     *    "culturas": {
     *        "id": 1,
     *        "name": "cultura6",
     *        "created_at": "2020-07-25T21:15:36.000000Z",
     *        "updated_at": "2020-07-26T01:58:57.000000Z"
     *    },
     *    "pragas": {
     *        "id": 3,
     *        "name": "praga3",
     *        "created_at": "2020-07-26T22:44:18.000000Z",
     *        "updated_at": "2020-07-26T22:44:18.000000Z"
     *    }
     *}
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(DosagensModel::
            with('produtos','culturas','pragas')
            ->get(),200);
    }

    /**
     * Show the form for creating a new dosagens.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Armazena novas dosagens.
     *
     * @bodyParam dosagem string com mínimo 4 e maximo 100 caracteres
     *
     * @authenticated
     *
     * @response {
     *  "idproduto": 2,
     *  "idcultura": 1,
     *  "idpraga": 3,
     *  "dosagem": "dosagem4",
     *  "updated_at": "2020-07-26T22:49:45.000000Z",
     *  "created_at": "2020-07-26T22:49:45.000000Z",
     *  "id": 12
     * }
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'dosagem' => 'required|min:4|max:100',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $dosagensModel = DosagensModel::create($request->all());
        return response()->json($dosagensModel, 201);
    }

    /**
     * Exibe uma dosagem específica
     *
     * @authenticated
     *
     * @response {
     *  "id": 12,
     *    "idcultura": 1,
     *    "idpraga": 3,
     *    "dosagem": "dosagem4",
     *    "created_at": "2020-07-26T22:49:45.000000Z",
     *    "updated_at": "2020-07-26T22:49:45.000000Z",
     *    "produtos": {
     *        "id": 2,
     *        "name": "produto9",
     *        "created_at": "2020-07-26T22:29:44.000000Z",
     *        "updated_at": "2020-07-26T22:29:44.000000Z"
     *    },
     *    "culturas": {
     *        "id": 1,
     *        "name": "cultura6",
     *        "created_at": "2020-07-25T21:15:36.000000Z",
     *        "updated_at": "2020-07-26T01:58:57.000000Z"
     *    },
     *    "pragas": {
     *        "id": 3,
     *        "name": "praga3",
     *        "created_at": "2020-07-26T22:44:18.000000Z",
     *        "updated_at": "2020-07-26T22:44:18.000000Z"
     *    }
     *}
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(DosagensModel::
            with('produtos','culturas','pragas')
            ->find($id),200);
    }

    /**
     * Show the form for editing the specified dosagens.
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
     * Altera uma dosagem específica.
     * @bodyParam name string com mínimo 4 e maximo 100 caracteres
     *
     * @authenticated
     *
     * @response {
     *  "id": 12,
     *    "idcultura": 1,
     *    "idpraga": 3,
     *    "dosagem": "dosagem4",
     *    "created_at": "2020-07-26T22:49:45.000000Z",
     *    "updated_at": "2020-07-26T22:49:45.000000Z",
     *    "produtos": {
     *        "id": 2,
     *        "name": "produto9",
     *        "created_at": "2020-07-26T22:29:44.000000Z",
     *        "updated_at": "2020-07-26T22:29:44.000000Z"
     *    },
     *    "culturas": {
     *        "id": 1,
     *        "name": "cultura6",
     *        "created_at": "2020-07-25T21:15:36.000000Z",
     *        "updated_at": "2020-07-26T01:58:57.000000Z"
     *    },
     *    "pragas": {
     *        "id": 3,
     *        "name": "praga3",
     *        "created_at": "2020-07-26T22:44:18.000000Z",
     *        "updated_at": "2020-07-26T22:44:18.000000Z"
     *    }
     *}
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
        $dosagensModel = DosagensModel::find($id);
        if (is_null($dosagensModel)) {
            return MensagemController::not_found();
        }
        $dosagensModel->update($request->all());
        return response()->json($dosagensModel, 200);
    }

    /**
     * Remove uma dosagem específico.
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
        $dosagensModel = DosagensModel::find($id);
        if (is_null($dosagensModel)) {
            return MensagemController::not_found();
        }
        $dosagensModel->delete();
        return response()->json(null, 204);
    }
}
