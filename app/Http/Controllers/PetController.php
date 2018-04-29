<?php

namespace App\Http\Controllers;

use App\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    function add(Request $request) {
        $pet = new Pet();
        $pet->name = $request->name;
        $pet->birthday = $request->birthday;
        $pet->description= $request->description;
        $pet->type = $request->type;
        $pet->waist = $request->waist;
        $pet->observations = $request->observations;
        $pet->save();
        return response()->json([
            'success' => true,
            'pet' => $pet,
        ]);
    }
}
