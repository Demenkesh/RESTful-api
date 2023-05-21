<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // register
    public function register(Request $request)
    {
        // $validatedData = $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|min:6',
        // ]);

        // // if ($request->fails()) {
        // //     return response()->json($request->errors(), 400);
        // // }

        // $validatedData['password'] = Hash::make($request->password);

        // $user = User::create($validatedData);

        // $accessToken = $user->createToken('authToken')->accessToken;

        // return response()->json([
        //     'user' => $user,
        //     'access_token' => $accessToken,
        // ], 201);


        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $accessToken = $user->createToken('authToken')->accessToken;
        return response()->json([
            'user' => $user,
            'access_token' => $accessToken,
        ], 201);
    }
    //login
    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($loginData)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        if (Auth::attempt($loginData)) {
            $accessToken = Auth::user()->createToken('authToken')->accessToken;
            return response()->json([
                'user' => Auth::user(),
                'access_token' => $accessToken,
            ]);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
}
