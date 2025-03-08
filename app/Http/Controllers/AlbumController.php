<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::orderBy('id', 'desc')->get();
        return response()->json($albums);
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
        $image = $request->file('image');
        $imagePath = $image->storeAs('uploads/image', $image->getClientOriginalName());

        $album = new Album;
        $album->artist = $request->artist;
        $album->album_title = $request->album_title;
        $album->type = $request->type;
        $album->image = $imagePath;
        $album->hot = $request->hot;
        $album->save();
        return response()->json($album);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $album = Album::find($id);
        return response()->json($album);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $album = Album::find($id);
        $album->artist = $request->artist;
        $album->album_title = $request->album_title;
        $album->type = $request->type;
        $album->image = $request->image;
        $album->hot = $request->hot;
        $album->save();
        return response()->json($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $album = Album::findOrFail($id);
        $album->delete();
        return response()->json($album);
    }

    public function search($query)
    {
        // Perform your search operation here, e.g., querying the database
        $results = Album::where('artist', 'like', "%$query%")->get();

        return response()->json($results);
    }

}