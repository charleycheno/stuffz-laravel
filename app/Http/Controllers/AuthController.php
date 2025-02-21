<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Events\Verified;

class AuthController extends Controller
{
    // Checks whether the user is authenticated and returns its user object

    public function auth() {
        return response()->json([
          'message' => 'Authenticated',
          'user' => Auth::user(),
        ], 200);
    }
    
    // Return a generated token if credentials match
    
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

    // Hash the password and return a generated token and user object if credentials are valid

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

    // Verifies user and returns a confirmation

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
    
        return view('auth.verified');
    }

    // Sends a password reset link to the users email

    public function forgotPassword(Request $request) {
      $request->validate(['email' => 'required|email']);
    
      $status = Password::sendResetLink(
          $request->only('email')
      );
    
      return response()->json(['message' => __($status)]);
    }

    // Resets the password

    public function resetPassword(Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);
     
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
     
                $user->save();
     
                event(new PasswordReset($user));
            }
        );
     
        return response()->json(['message' => __($status)]);
    }

    // Deletes the current access token

    public function logout() {
        Auth::user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out']);
    }
}
