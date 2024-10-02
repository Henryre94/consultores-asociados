<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GraphicController extends Controller
{
    public function saveGraphic(Request $request)
    {
        if ($request->hasFile('image')) {
            // Guarda la imagen en storage/app/public/charts
            $path = $request->file('image')->store('public/storage/images');
            return response()->json(['path' => Storage::url($path)]);
        }

        return response()->json(['error' => 'No se recibió ninguna imagen'], 400);
    }
}
