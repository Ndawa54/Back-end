<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Single;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function multiSearch(Request $request)
    {
        $searchQuery = $request->query('query');

        try {
            // Search in singles table
            $singlesResult = Single::where('title', 'LIKE', "%{$searchQuery}%")->get();

            // Search in albums table
            $albumsResult = Album::where('title', 'LIKE', "%{$searchQuery}%")->get();

            // Search in artists table
            $artistsResult = Artist::where('name', 'LIKE', "%{$searchQuery}%")->get();

            // Consolidate results
            $searchResults = [
                'singles' => $singlesResult,
                'albums' => $albumsResult,
                'artists' => $artistsResult
            ];

            return response()->json($searchResults);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while executing the search.'], 500);
        }
    }
}
