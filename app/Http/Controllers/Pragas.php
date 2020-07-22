<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PragasModel;
use Validator;

class Pragas extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(PragasModel::get(),200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

    /**
     * Display the specified resource.
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
        return response()->json(PragasModel::find($id),200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pragasModel = PragasModel::find($id);
        if (is_null($pragasModel)) {
            return MensagemController::not_found();
        }
        $pragasModel->update($request->all());
        return response()->json($pragasModel, 200);
    }

    /**
     * Remove the specified resource from storage.
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
