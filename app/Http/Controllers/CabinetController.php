<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cabinet;
use Illuminate\Support\Facades\Auth;

class CabinetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $cabinet = Cabinet::find($id);
        if ($cabinet) {
            return response()->json([
                'succes' => true,
                'cabinet' => $cabinet
            ]);
        } else {
            return response()->json([
                'succes' => false
            ]);
        }
    }

    public function all(Request $request) {
        $cabinets = Cabinet::orderBy('created_at', 'DESC');
        if($request->search) $cabinets->where('name', 'LIKE', '%'.$request->search.'%');

        return response()->json([
            'success' => true,
            'cabinets' => $cabinets->get(),
        ]);
    }

    function add(Request $request) {
        $cabinet = new Cabinet();
        $cabinet->name = $request->name;
        $cabinet->description = $request->description;
        $cabinet->location = $request->location;
        $cabinet->price = $request->price;
        $cabinet->image_id = '1.jpg';
        $cabinet->admin_id = Auth::user()->id;
        $cabinet->save();
        return response()->json([
            'success' => true,
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
