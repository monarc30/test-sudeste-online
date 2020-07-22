<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DosagensModel;

class DosagensController extends Controller
{
    public function show( DosagensModel $dosagensmodel ) {

        $produtos = $dosagensmodel->produtos()->first();

        echo $produtos->name;

    }

}
