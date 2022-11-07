<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function register(Request $request) {
        $fields = $request->validate([
            'email'=> 'required|email|unique:users,email',
            'password'=> 'required|string|confirmed',
            'role'=> 'required|integer',
        ]);

        $user = User::create([
            'email'=> $fields['email'],
            'password'=> bcrypt($fields['password']),
            'role'=> $fields['role'],
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user'=> $user,
            'token'=> $token,
        ];

        return response($response, 201);
    }


    public function login(Request $request) {
        $fields = $request->validate([
            'email'=> 'required|email',
            'password'=> 'required|string'
        ]);


        $user = User::where('email', $fields['email'])->first();

        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response(['message'=> 'Invalid credentials'], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user'=> $user,
            'token'=> $token,
        ];

        return response($response, 201);
    }

    public function logout(Request $request) {
        auth()->user()->tokens()->delete();
        return [
            'message'=> 'Successfully logged out',
        ];
    }
}
