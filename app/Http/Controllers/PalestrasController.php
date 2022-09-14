<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Palestra;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

date_default_timezone_set('America/Sao_Paulo');

class PalestrasController extends Controller
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
            $palestras = Palestra::where([["name", "like", "%" . $search . "%"]])->get();
        }
        
        else {
            $palestras = Palestra::where('date' , '>=' , date("Y-m-d H:i"))->orderBy('date', 'desc')->get();            
            //$palestras = Palestra::all()->sortByDesc("date");
        }

        return view('palestras', ["palestras" => $palestras,"search"=>$search,"months"=>$months]);
    }


    public function palestra($id)
    {
        $palestra = Palestra::findOrFail($id);

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

        $manypalestras = $user->palestras;

        $manyusers = $palestra->users;

        return view('palestra', ["palestra" => $palestra,"months"=>$months,"manypalestras"=>$manypalestras,"manyusers"=>$manyusers, "user"=>$user]);
    }


    public function store(Request $request)
    {
        $palestra = new Palestra;

        $palestra->name = $request->name;
        $palestra->info = $request->info;
        $palestra->date = $request->date; 
        $palestra->link = $request->link; 

        $palestra->save();

        return redirect('/palestras')->with("msg", "Palestra adicionada com sucesso");
    }


    public function update(Request $request)
    {
        Palestra::findOrFail($request->id)->update($request->all());

        return redirect('/palestras'.'/'.$request->id)->with("msg", "Palestra editada com sucesso");
    }

    /* Função desabilitada
    public function destroy($id)
    {
        Palestra::findOrFail($id)->delete();

        return redirect('/palestras')->with("msg", "Palestra excluída com sucesso");
    }
    */


    public function join($id)
    {
        $user = auth()->user();
        $user->palestras()->attach($id);

        return redirect('/palestras'.'/'.$id)->with("msg", "Você está confirmado no evento");        
    }


    public function leave($id)
    {
        $user = auth()->user();
        $user->palestras()->detach($id);

        return redirect('/palestras'.'/'.$id)->with("msg", "Você saiu do evento");        
    }
}
