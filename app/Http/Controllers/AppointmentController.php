<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Cabinet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    function add(Request $request) {
        $appointment = new Appointment();
        $appointment->service_id = $request->service;
        $appointment->pet_id = $request->pet;
        $appointment->cabinet_id = $request->cabinet;
        $appointment->description = $request->description;
        $appointment->date = $request->date;
        $appointment->save();
        return response()->json([
            'success' => true,
        ]);
    }

    function get($id) {
        $cabinet = Cabinet::find($id);
        if ($cabinet) {
            return response()->json([
                'succes' => true,
                'appointments' => $cabinet->appointments
            ]);
        } else {
            return response()->json([
                'succes' => false
            ]);
        }
    }
}
