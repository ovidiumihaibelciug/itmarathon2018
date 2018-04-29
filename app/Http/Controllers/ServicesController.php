<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use Illuminate\Support\Facades\Auth;

class ServicesController extends Controller
{
    //
    function add(Request $request) {
        $service = new Service();
        $service->name = $request->name;
        $service->description = $request->description;
        $service->icon = $request->icon;
        $service->cabinet_id = Auth::user()->cabinet_id;
        $service->save();
        return response()->json([
            'success' => true,
        ]);
    }
}
