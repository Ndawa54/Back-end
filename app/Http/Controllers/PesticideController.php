<?php

namespace App\Http\Controllers;

use App\Models\Pesticide;
use Illuminate\Http\Request;

class PesticideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pests = Pesticide::orderBy('id', 'desc')->get();
        return response()->json($pests);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pest = new Pesticide;
        $pest->name = $request->name;
        $pest->type = $request->type;
        $pest->treatment = $request->treatment;
        $pest->application_time = $request->application_time;
        $pest->application_date = $request->application_date;
        $pest->application_to = $request->application_to;
        $pest->save();
        return response()->json($pest);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pest = Pesticide::find($id);
        return response()->json($pest);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pest = Pesticide::find($id);
        $pest->name = $request->name;
        $pest->type = $request->type;
        $pest->treatment = $request->treatment;
        $pest->application_time = $request->application_time;
        $pest->application_date = $request->application_date;
        $pest->application_to = $request->application_to;
        $pest->save();
        return response()->json($pest);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }
}
