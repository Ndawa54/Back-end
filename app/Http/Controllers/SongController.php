<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $songs = Song::orderBy('track', 'asc')->get();
        return response()->json($songs);
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
       
        // Handle the audio file
        $audio = $request->file('audio');
        $audioPath = $audio->storeAs('uploads/albums', $audio->getClientOriginalName());

        $song = new Song;
        $song->track = $request->track;
        $song->album_title = $request->album_title;
        $song->title = $request->title;
        $song->audio = $audioPath;
        $song->features = $request->features;
        $song->save();
        return response()->json($song);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $song = Song::find($id);
        return response()->json($song);
    }

   

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $song = Song::find($id);
        $song->track = $request->track;
        $song->album_title = $request->album_title;
        $song->title = $request->title;
        $song->audio = $request->audio;
        $song->features = $request->features;
        $song->save();
        return response()->json($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $song = Song::findOrFail($id);
        $song->delete();
        return response()->json($song);
    }

    
}
