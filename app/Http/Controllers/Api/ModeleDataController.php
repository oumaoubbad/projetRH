<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Marque;

use Illuminate\Http\Request;

class ModeleDataController extends Controller
{
    //
    public function marques()
    {
        $marques = Marque::all();

        return response()->json($marques);
    }

}
