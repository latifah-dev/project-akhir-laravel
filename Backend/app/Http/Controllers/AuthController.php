<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    function login(Request $request) {
        $user = User::query()
        ->where("email", $request->input("email"))
        ->first();

        if($user == null) {
            return response()->json([
                "status" => false,
                "message" => "email tidak ditemukan",
                "data" => null
            ]);
        }
        if(!Hash::check($request->input("password"), $user->password)) {
            return response()->json([
                "status" => false,
                "message" => "password salah",
                "data" => null
            ]);
        }

        $token = $user->createToken("auth_token");
        return response()->json([
            "status" => true,
            "message" => "",
            "data" => [
                "auth" => [
                    "token" => $token->plainTextToken,
                    "token_type" => 'Bearer'
                ],
                "user" => $user
            ]
        ]);
    }

    function getUser(Request $request) {
        $user = $request->user();
        return response()->json([
            "status" => true,
            "message" => "",
            "data" => $user
        ]);
    }
    public function register(Request $request)
    {
        $request['email_verified_at'] = now();
        $request["remember_token"] = str::random(10);
        $payload = $request->all();
        $user = User::query()->create($payload);
        return response()->json([
            "status" => true,
            "message" => "",
            "data" => $user
        ]);
    }
}
