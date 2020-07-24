<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DosagensModel;
use Illuminate\Support\Facades\Validator;

class Dosagens extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(DosagensModel::get(),200);
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
            'name' => 'required|min:4|max:100',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $dosagensModel = DosagensModel::create($request->all());
        return response()->json($dosagensModel, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dosagensModel = DosagensModel::find($id);
        if (is_null($dosagensModel)) {
            return MensagemController::not_found();
        }
        return response()->json(DosagensModel::find($id),200);
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
        $dosagensModel = DosagensModel::find($id);
        if (is_null($dosagensModel)) {
            return MensagemController::not_found();
        }
        $dosagensModel->update($request->all());
        return response()->json($dosagensModel, 200);
    }

    /**
     * Remove the specified resource from storage.
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
