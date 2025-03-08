<?php

namespace App\Http\Controllers;

use App\Models\Critical;
use Illuminate\Http\Request;

class CriticalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $critical = Critical::orderBy('id', 'desc')->get();
        return response()->json($critical);
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
        $criticality = new Critical();
        $criticality->name = $request->name;
        $criticality->critical_level = $request->critical_level;
        $criticality->detail = $request->detail;
        $criticality->save();
        return response()->json($criticality);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $criticality =  Critical::find($id);
        return response()->json($criticality);

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
        $criticality = new Critical();
        $criticality->name = $request->name;
        $criticality->critical_level = $request->critical_level;
        $criticality->detail = $request->detail;
        $criticality->save();
        return response()->json($criticality);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
