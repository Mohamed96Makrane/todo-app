<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    // Inscription avec upload d'image
    public function register(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'phone_number' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'password' => 'required|string|min:6|confirmed',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Upload image si fournie
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $user = User::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'image' => $imagePath,
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json([
            'message' => 'Utilisateur créé avec succès',
            'user' => $user,
            'token' => $token
        ], 201); // 201 Created
    }

    // Connexion
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Identifiants invalides'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'Impossible de créer le token'], 500);
        }

        return response()->json([
            'message' => 'Connexion réussie',
            'token' => $token
        ], 200); // 200 OK
    }
}
