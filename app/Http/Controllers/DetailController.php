<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $details = Detail::orderBy('id','desc')->get();
        return response()->json($details);
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
        $detail = new Detail();
        $detail->user_id = $request->user_id;
        $detail->country = $request->country;
        $detail->reason = $request->reason; 
        $detail->description = $request->description;
        $detail->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $detail = Detail::find($id);
        return response()->json($detail);
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
        $detail = Detail::find($id);
        $detail->user_id = $request->user_id;
        $detail->country = $request->country;
        $detail->reason = $request->reason; 
        $detail->description = $request->description;
        $detail->save();
        return response()->json($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
