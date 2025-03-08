<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     
    public function index()
    {
        $notification = Notification::orderBy('id', 'desc')->get();
        return response()->json($notification);
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
        $notify = new Notification;
        $notify ->name = $request->name;
        $notify ->type = $request->type;
        $notify ->cause = $request->cause;
        $notify ->save();
        return response()->json($notify );
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $notify  = Notification::find($id);
        return response()->json($notify );

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
        $notify  = Notification::find($id);
        $notify ->name = $request->name;
        $notify ->type = $request->type;
        $notify ->cause = $request->cause;
     
        $notify ->save();
        return response()->json($request);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getCounts() {
    $diseaseCount = Notification::where('type', 'disease')->count();
    $weedCount = Notification::where('type', 'weed')->count();
    
    return response()->json([
        'diseases' => $diseaseCount,
        'weeds' => $weedCount,
    ]);
}
}

