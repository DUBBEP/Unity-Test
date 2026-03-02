<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($attributes)) {
            // Return 401 Unauthorized instead of throwing a View Exception
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('unity_session')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'token' => $token,
            'user' => $user
        ]);
    }

    public function destroy(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out successfully']);
    }   
}