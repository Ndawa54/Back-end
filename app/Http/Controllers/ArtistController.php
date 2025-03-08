<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artists = Artist::orderBy('id', 'desc')->get();
        return response()->json($artists);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image = $request->file('image');
        $imagePath = $image->storeAs('uploads/artist', $image->getClientOriginalName());

        $artist = new Artist;
        $artist->name = $request->name;
        $artist->bio = $request->bio;
        $artist->image = $imagePath;
        $artist->save();
        return response()->json($artist);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $artist = Artist::findOrFail($id);
         return response()->json($artist);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $artist = Artist::findOrFail($id);
       $artist->name = $request->name;
       $artist->bio = $request->bio;
       $artist->image = $request->image;
       $artist->save();
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
