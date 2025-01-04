<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // Get Profile
    public function getProfile(Request $request)
    {
        $user = $request->user();

        return response()->json([
            'status' => true,
            'data' => $user,
            'message' => 'Sukses mendapatkan data user',
        ]);
    }

    // Update Profile
    public function updateProfile(Request $request)
    {
        $user = $request->user();

        $validatedData = $request->validate([
            'name' => 'string',
            'email' => 'email',
        ]);

        $user->update($validatedData);

        return response()->json([
            'status' => true,
            'data' => $user->id,
            'message' => 'Sukses mengubah data user',
        ]);
    }
}
