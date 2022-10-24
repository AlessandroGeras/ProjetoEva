<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lecture;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

date_default_timezone_set('America/Sao_Paulo');

class LecturesController extends Controller
{

    public function show()
    {
        $search = request("search");            
        $months = array(
            1 => 'Janeiro',
            'Fevereiro',
            'Março',
            'Abril',
            'Maio',
            'Junho',
            'Julho',
            'Agosto',
            'Setembro',
            'Outubro',
            'Novembro',
            'Dezembro'
        );

        if ($search) {
            $lectures = Lecture::where([["name", "ilike", "%" . $search . "%"]])->get();
        }
        
        else {
            $lectures = Lecture::where('date' , '>=' , date("Y-m-d H:i"))->orderBy('date', 'desc')->get();            
            //$lectures = Lecture::all()->sortByDesc("date");
        }

        return view('lectures', ["lectures" => $lectures,"search"=>$search,"months"=>$months]);
    }


    public function lecture($id)
    {
        $lecture = Lecture::findOrFail($id);

        $months = array(
            1 => 'Janeiro',
            'Fevereiro',
            'Março',
            'Abril',
            'Maio',
            'Junho',
            'Julho',
            'Agosto',
            'Setembro',
            'Outubro',
            'Novembro',
            'Dezembro'
        );

        $user = User::find(Auth::id());

        $manylectures = $user->lectures;

        $manyusers = $lecture->users;

        return view('lecture', ["lecture" => $lecture,"months"=>$months,"manylectures"=>$manylectures,"manyusers"=>$manyusers, "user"=>$user]);
    }


    public function store(Request $request)
    {
        $lecture = new Lecture;

        $lecture->name = $request->name;
        $lecture->info = $request->info;
        $lecture->date = $request->date; 
        $lecture->link = $request->link; 

        $lecture->save();

        return redirect('/dashboard')->with("msg", "Palestra adicionada com sucesso");
    }


    public function update(Request $request)
    {
        Lecture::findOrFail($request->id)->update($request->all());

        return redirect('/lectures'.'/'.$request->id)->with("msg", "Palestra editada com sucesso");
    }

    /* Função desabilitada
    public function destroy($id)
    {
        Lecture::findOrFail($id)->delete();

        return redirect('/lectures')->with("msg", "Palestra excluída com sucesso");
    }
    */

    //Usuário ingressar em uma palestra
    public function join($id)
    {
        $user = auth()->user();
        $user->lectures()->attach($id);

        return redirect('/lectures'.'/'.$id)->with("msg", "Você está confirmado no evento");        
    }

    //Usuário sair de uma palestra
    public function leave($id)
    {
        $user = auth()->user();
        $user->lectures()->detach($id);

        return redirect('/lectures'.'/'.$id)->with("msg", "Você saiu do evento");        
    }
}
