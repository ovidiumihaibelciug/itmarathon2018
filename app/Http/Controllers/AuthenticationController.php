<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    //
    function getAuthUser() {
        if (Auth::user()) {
            return response()->json([
                'success' => true,
                'user' => Auth::user()
            ]);
        } else {
            return response()->json([
                'success' => false
            ]);
        }
    }
    function getUser($username) {
        return response()->json([
            'success' => true,
            'user' => User::where('username',$username)->first()
        ]);
    }
}
