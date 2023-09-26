<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $credenciales = $request->only('email', 'password');
        if(Auth::attempt($credenciales)){
            $user = Auth::user();
            $token = $user->createToken('API Token')->plainTextToken;
            return response()->json(['token' => $token] );
        }else{
            return response()->json(['message' => 'Credenciales inválidas'] );
        }
    }
}
