<?php

namespace App\Http\Controllers;

use App\Pet;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $pet->sex = $request->sex;
        $pet->user_id = Auth::user()->id;
        $pet->save();
        return response()->json([
            'success' => true,
            'pet' => $pet,
        ]);
    }
    function get($username) {
        $user = User::where('username',$username)->first();
        return response()->json([
            'success' => true,
            'pet' => $user->pets,
        ]);
    }
    function getPet(Pet $pet){
        return response()->json([
            'success' => true,
            'pet' => $pet,
        ]);
    }
    function delete(Pet $pet) {
        $pet->delete();
        return response()->json([
            'success' => true,
        ]);
    }
}
