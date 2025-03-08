<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $login = Login::orderBy('id', 'desc')->get();
        return response()->json($login);
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
        $logins = new Login();
        $logins->username = $request->username;
        $logins->password = $request->password;
        $logins->save();
        return response()->json($logins);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $logins  = Login::find($id);
        return response()->json($logins );

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
        $logins  = Login::find($id);
        $logins->username = $request->username;
        $logins->password = $request->password;
        $logins->save();
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
