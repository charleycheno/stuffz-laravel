<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Events\Verified;

class AuthController extends Controller
{
    public function login(Request $request) {
        $credentials = $request->validate([
          'email' => ['required', 'string', 'email'],
          'password' => ['required', 'string'],
        ]);

        if(Auth::attempt($credentials)) {
          $user = User::where('email', $request->email)->firstOrFail();
    
          $token = $user->createToken('user-token')->plainTextToken;

          $response = [
            'user' => $user,
            'token' => $token,
          ];

          return response()->json($response, 201);
        }

        throw ValidationException::withMessages([
          'email' => 'The provided credentials are incorrect',
        ]);
    }

    public function register(Request $request) {
        $request->validate([
          'name' => ['required', 'string', 'max:255'],
          'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
          'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
          'name' => $request->name,
          'email' => $request->email,
          'password' => Hash::make($request->string('password')),
        ]);

        new Verified($request->user());
        
        $token = $user->createToken('user-token')->plainTextToken;

        $response = [
          'user' => $user,
          'token' =>$token,
        ];

        return response()->json($response, 201);
    }

    public function logout() {
        Auth::user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out']);
    }
}
