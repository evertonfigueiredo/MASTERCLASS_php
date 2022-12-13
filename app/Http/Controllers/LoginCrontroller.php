<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginCrontroller extends Controller
{
    public function login(Request $request)
    {
        $credenciais = $request->only('email', 'password');

        if (!auth()->attempt($credenciais)) {
            return response()->json([
                'status' => false,
                'msg' => "Credenciais invalidas!",
                'data' => [],
            ],401);
        }

        $token = $request->user()->createToken('auth_token');

        return response()->json([
            'status' => true,
            'msg' => "Token criado com sucesso!",
            'data' => [
                'token' => $token->plainTextToken
            ],
        ],200);
    }
}
