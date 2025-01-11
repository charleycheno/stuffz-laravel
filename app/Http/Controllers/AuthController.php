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
 
        event(new Registered($user));
        
        $token = $user->createToken('user-token')->plainTextToken;

        $response = [
          'user' => $user,
          'token' =>$token,
        ];

        return response()->json($response, 201);
    }

    public function verifyEmail(Request $request) {
        $user = User::find($request->route('id'));

        if(!$user) {
          return response()->json(['message' => 'User not found'], 404);
        }
    
        if (!hash_equals((string) $request->route('hash'), sha1($user->getEmailForVerification()))) {
            return response()->json(['message' => 'The provided URL is invalid'], 400);
        }
    
        if ($user->markEmailAsVerified()){
            event(new Verified($user));
        }
    
        return redirect(env('FRONTEND_URL', 'https://google.com'));
    }

    public function logout() {
        Auth::user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out']);
    }
}
