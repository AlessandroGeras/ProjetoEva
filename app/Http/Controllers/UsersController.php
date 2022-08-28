<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index()
    {
        return response()->view('index')->setStatusCode(200);
    }

    public function login()
    {
         return response()->view('auth/login')->setStatusCode(200);
    }

    public function autorizar(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) { 
            return redirect()->intended();
        }
        else{
            return back()->with("msg", "Erro de autenticação: Verifique seu email e a senha")->setStatusCode(401);
        }
    }
}
