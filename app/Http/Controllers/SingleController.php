<?php

namespace App\Http\Controllers;

use App\Models\Single;
use Illuminate\Http\Request;

class SingleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $singles = Single::orderBy('id', 'desc')->get();
       return response()->json($singles);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function store(Request $request)
    {

        $image = $request->file('image');
        $imagePath = $image->storeAs('uploads/image', $image->getClientOriginalName());

        // Handle the audio file
        $audio = $request->file('audio');
        $audioPath = $audio->storeAs('uploads/audio', $audio->getClientOriginalName());

        $single = new Single ;
        $single->artist = $request->artist;
        $single->title = $request->title;
        $single->image = $imagePath;
        $single->audio = $audioPath;
        $single->hot = $request->hot;
        $single->save();
        return response()->json($single);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $single = Single::findOrFail('id');
        return response()->json($single);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $single = Single::find($id);
        $single->artist = $request->artist;
        $single->title = $request->title;
        $single->image = $request->image;
        $single->audio = $request->audio;
        $single->hot = $request->hot;
        $single->save();
        return response()->json($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $single = Single::findOrFail($id);
        $single->delete();
        return response()->json($single);
    }

     public function songSearch($query)
    {
        // Perform your search operation here, e.g., querying the database
        $results = Single::where('title', 'like', "%$query%")->get();

        return response()->json($results);
    }

    public function download($filename)
    {
        $filePath = storage_path('uploads/audio/' . $filename);

        if (!file_exists($filePath)) {
            return response()->json(['message' => 'File not found.'], 404);
        }

        return response()->download($filePath, $filename, [
            'Content-Type' => 'audio/mpeg',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"'
        ]);
    }
}
