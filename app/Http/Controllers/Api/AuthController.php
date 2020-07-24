<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validaDados = $request->validate([
            'name'=>'required|max:100',
            'email'=>'email|required|unique:users',
            'password'=>'required|confirmed'
        ]);

        $validaDados['password'] = bcrypt($request->password);

        $user = User::create($validaDados);

        $TokenAcesso = $user->createToken('authToken')->accessToken;

        return response(['user'=>$user, 'access_token'=>$TokenAcesso]);

    }

    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email'=>'email|required',
            'password'=>'required'
        ]);

        if (!auth()->attempt($loginData)) {
            return response(['message'=>'Login Inválido']);
        }

        $TokenAcesso = auth()->user()->createToken('authToken')->accessToken;
        return response(['user' => auth()->user(), 'access_token'=>$TokenAcesso]);
    }
}
