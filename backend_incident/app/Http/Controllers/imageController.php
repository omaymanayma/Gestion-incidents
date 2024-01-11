<?php

namespace App\Http\Controllers;
use App\Models\image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class imageController extends Controller
{
    //
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'type' => 'required|in:incident,action',
            'type_id' => 'required|exists:' . ($request->type === 'incident' ? 'incidents' : 'actions') . ',id',
        ]);

        // Handle file upload
        $file = $request->file('file');

        // Determine the storage directory based on the model type
        $storageDirectory = 'images/' . ($request->type === 'incident' ? 'incident' : 'action');
        // Create the directory if it doesn't exist
        Storage::makeDirectory($storageDirectory);
        // Store the file in the appropriate directory
        $path = $file->store($storageDirectory);


        // Create the image record
        $image = image::create([
            'imageable_id' => $request->type_id,
            'imageable_type' => 'App\Models\\' .$request->type,
            'filename' => $path, // Adjust based on your actual image storage structure
            // Add other image attributes if needed
        ]);

        // Return a response
        return response()->json(['message' => 'Image uploaded successfully', 'image' => $image]);
    }
}
