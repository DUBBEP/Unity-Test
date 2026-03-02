<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validate (Laravel returns 422 JSON automatically if this fails)
        $userAttributes = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::min(6)],
        ]);

        // 2. Create the User
        $user = User::create([
            'name' => $userAttributes['name'],
            'email' => $userAttributes['email'],
            'password' => bcrypt($userAttributes['password']),
        ]);

        // 3. Generate Token for Unity
        $token = $user->createToken('unity_device')->plainTextToken;

        // 4. Return JSON instead of redirect('/')
        return response()->json([
            'message' => 'User registered successfully',
            'token' => $token,
            'user' => $user
        ], 201);
    }
}