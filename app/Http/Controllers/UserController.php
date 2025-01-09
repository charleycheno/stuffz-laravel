<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
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

        return response()->json("User created successfully", 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return User::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->update($request->all());
        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      $result = User::destroy($id);

      if($result) {
          return response()->json([
              'message' => 'User deleted successfully',
          ], 200);
      } else {
          return response()->json([
              'message' => 'Failed to delete user',
          ], 400);
      }
    }
}
