<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

class FileController extends Controller
{
    public function getImage($filename)
    {
        $filePath = public_path('uploads/image/' . $filename);

        if (file_exists($filePath)) {
            return response()->file($filePath);
        } else {
            return response()->json(['error' => 'Image not found.'], 404);
        }
    }

    public function getAudio($filename)
    {
        $filePath = public_path('uploads/audio/' . $filename);

        if (file_exists($filePath)) {
            return response()->file($filePath);
        } else {
            return response()->json(['error' => 'Audio file not found.'], 404);
        }
    }
}

