<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Palestra;
use App\Models\Permission;
use App\Models\Warning;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

date_default_timezone_set('America/Sao_Paulo');

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

        $permission=Permission::where('role', '=', 'Usuário')->firstOrFail();
        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->permission_id=$permission->id;
        $user->save(); 
        
        Auth::login($user);
        $user = User::find(Auth::id());

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
        return response()->view('auth.forgetPasswordLink', ['token' => $token])->setStatusCode(200);
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

        return redirect('auth/login')->with('message', 'Sua senha foi alterada com sucesso');
    }


     public function index()
    {   
        $messages = array(
            0 => 'As crianças especiais, assim como as aves, são diferentes em seus voos. Todas, no entanto, são iguais em seu direito de voar.',
            'Autismo: Apenas uma palavra. Não uma sentença.',
            'Pessoas com autismo não mentem, não julgam, não fazem jogos mentais. Talvez possamos aprender alguma coisa com elas.',
            'Os médicos determinaram um tratamento efetivo para pessoas com autismo. Chama-se respeito!',
            'O autismo não é o inimigo. O inimigo é o preconceito.',
            'O autismo não é um erro de processamento. É um sistema operativo diferente.'
        );

        $warning = Warning::where('date' , '>=' , date("Y-m-d H:i"))->orderBy('date', 'desc')->get(); 

        return view('index',['warning' => $warning, 'messages' => $messages]);
    }


    public function userinfo()
    {       
        return view('auth/userinfo');
    }


    public function verifyUserInfo(Request $request)
    {
        $credentials = $request->validate([
            'password' => ['required'],
        ]);

        $credentials['email'] = auth()->user()->email;

        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('newUserInfo'));
        } else {
            return redirect()->intended(route('dashboard'))->with("msg", "Erro de autenticação: Verifique sua senha");
        }
    }


    public function newUserInfo()
    {
        $user = auth()->user();
        return view('auth/newUserInfo',['user' => $user]);
    }


    public function setnewUserInfo(Request $request)
    {      
        $user = User::find(Auth::user()->id);

        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;

        $user->save();

        return redirect(route('dashboard'))->with("msg", "Dados alterados com sucesso");
    }


    public function password()
    {
        return view('auth/password');
    }


    public function verifyPassword(Request $request)
    {
        $credentials = $request->validate([
            'password' => ['required'],
        ]);

        $credentials['email'] = auth()->user()->email;

        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('newPassword'));
        } else {
            return redirect()->intended(route('dashboard'))->with("msg", "Erro de autenticação: Verifique sua senha");
        }
    }


    public function newPassword()
    {
        return view('auth/newpassword');
    }


    public function setnewPassword(Request $request)
    {
        $request->validate([            
            'password' => [
                'required',
                'min:8',              // must be at least 8 characters in length
                //    'regex:/[a-z]/',       must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                //    'regex:/[0-9]/',       must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
            ],
            'newpassword' => [
                'required',
                'min:8',              // must be at least 8 characters in length
                //    'regex:/[a-z]/',       must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                //    'regex:/[0-9]/',       must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
                'same:password'
            ]
        ]);

        $user = User::find(Auth::user()->id);

        $user->password = Hash::make($request->password);

        $user->save();


        return redirect(route('dashboard'))->with("msg", "Senha alterada com sucesso");
    }    


   public function dashboard(Request $request)
    {
        $user = User::find(Auth::id());

        if (($user->permission->role) == ('Usuário')) {

            $manylectures = $user->palestras->where('date', '>=', date("Y-m-d H:i"))->sortBy('date');

            $manyconsultas = $user->consultas->sortBy('date');

            return view('dashboard', ["user" => $user, "manylectures" => $manylectures, "manyconsultas" => $manyconsultas ]);
        }


        if ($user->permission->role == ('Administrador') || ('Profissional')) {

            $search = request("search");
            $users = null;

            if ($search) {
                $users = User::where([["name", "like", "%" . $search . "%"]])->get();
            }

            $warning = Warning::where('date', '>=', date("Y-m-d H:i"))->orderBy('date', 'desc')->get();

            $palestras = Palestra::where('date', '>=', date("Y-m-d H:i"))->orderBy('date', 'asc')->get();

            return view('dashboard', ["user" => $user, "palestras" => $palestras, "warning" => $warning, 'users' => $users]);
        }
    }


     public function show($id)
    {
        $user = User::findOrFail($id);
        $currentUser = User::find(Auth::id());

        $manylectures = $user->palestras->where('date', '>=', date("Y-m-d H:i"))->sortBy('date');

        $manyconsultas = $user->consultas->sortBy('date');

        return view('user', ["currentUser" => $currentUser, "user" => $user, "manylectures" => $manylectures,"manyconsultas" => $manyconsultas]);
    }


    public function permission(Request $request)
    {
        $permission = Permission::where('role', '=', $request->role)->firstOrFail();

        $user = User::findOrFail($request->id);

        $user->permission_id = $permission->id;
        $user->save();

        return redirect()->back()->with("msg", "Permissão alterada com sucesso");
    }	
}
