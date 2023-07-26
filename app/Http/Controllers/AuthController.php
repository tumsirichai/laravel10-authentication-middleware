<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register( Request $request){
        $data = $request->validate([
            'name' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed'
        ]);

        // Set default role to 'admin' if not provided in the request
        // $userData = array_merge($data, ['role' => $data['role'] ?? 'admin']);

        // Mass assign the validated request data to a new instance of the User model
        $user = User::create($data);
        $token = $user->createToken('my-token')->plainTextToken;

        return response()->json([
            'token' =>$token,
            'Type' => 'Bearer'
        ]);
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $fields['email'])->first();

        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Wrong credentials'
            ]);
        }

        $token = $user->createToken('my-token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'name' => $user->name,
            'Type' => 'Bearer',
            'role' => $user->role // include user role in response
        ]);
    }
    
}
