<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    public function register()
    {
        return response()->view('auth/register')->setStatusCode(200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => [
                'required',
                'min:8',              // must be at least 8 characters in length
                //    'regex:/[a-z]/',       must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                //    'regex:/[0-9]/',       must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
            ]
        ]);

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);

        $user->save();

        Auth::login($user);
        return redirect()->intended('/');
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
            return back()->with("msg", "Erro de autenticação: Verifique seu email e a senha");
        }
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    
     public function showForgetPasswordForm()
    {
        return view('auth.forgetPassword');
    }
    
     public function submitForgetPasswordForm(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email']
        ]);

        if ($credentials) {
            if (User::where('email', '=', $request->email)->exists()) {
                $token = Str::random(64);

                DB::table('password_resets')->insert([
                    'email' => $request->email,
                    'token' => $token,
                    'created_at' => date('Y-m-d\TH:i')
                ]);

                Mail::send('email.forgetPassword', ['token' => $token], function ($message) use ($request) {
                    $message->to($request->email);
                    $message->subject('Reset Password');
                });

                return redirect('/')->with("msg", "O email de recuperação de senha foi enviado");
            } else {
                return redirect('/')->with('message', "Falha ao enviar o email de recuperação de senha. Tente mais tarde");
            }
        }
    }
    
     public function index()
    {
        return response()->view('index')->setStatusCode(200);
    }
}
