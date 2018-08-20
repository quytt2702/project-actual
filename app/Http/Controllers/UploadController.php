<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function images(Request $request)
    {
        $location = '';

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            // Upload file
            $location = asset('storage/' . $file->store('images'));
        }

        return response()->json(compact('location'));
    }
}
