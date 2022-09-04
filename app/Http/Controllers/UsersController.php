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
            ],
             'password_confirmation' => [
                'required',
                'min:8',              // must be at least 8 characters in length
                //    'regex:/[a-z]/',       must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                //    'regex:/[0-9]/',       must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
                 'same:password',
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
        return response()->view('auth.forgetPassword')->setStatusCode(200);
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
                    $message->from('projetoevagaropaba@gmail.com', 'Projeto Eva');
                    $message->subject('Recuperação de senha');
                });

                return redirect('/')->with("msg", "O email de recuperação de senha foi enviado");
            } else {
                return redirect('/')->with('message', "Falha ao enviar o email de recuperação de senha. Tente mais tarde");
            }
        }
    }
    
    public function showResetPasswordForm($token)
    {
        return view('auth.forgetPasswordLink', ['token' => $token])->setStatusCode(200);
    }
    
     public function submitResetPasswordForm(Request $request)
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
            ],
             'password_confirmation' => [
                'required',
                'min:8',              // must be at least 8 characters in length
                //    'regex:/[a-z]/',       must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                //    'regex:/[0-9]/',       must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
                 'same:password',
            ]
        ]);

        $updatePassword = DB::table('password_resets')
                            ->where([
                              'email' => $request->email, 
                              'token' => $request->token
                            ])
                            ->first();

        if(!$updatePassword){
            return redirect('/')->with("msg", "Falha no link de verificação");
        }

        $user = User::where('email', $request->email)
                    ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        return redirect('/login')->with('message', 'Sua senha foi alterada com sucesso');
    }
    
     public function index()
    {
        return response()->view('index')->setStatusCode(200);
    }
}
