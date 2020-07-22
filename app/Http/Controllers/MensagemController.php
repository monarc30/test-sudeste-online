<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MensagemController extends Controller
{
    public static function not_found() {
        return response()->json(["message" => "Record not found!"], 404);
    }
}
