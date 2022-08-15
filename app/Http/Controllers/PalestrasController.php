<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Palestra;

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
            $palestras = Palestra::all()->sortByDesc("date");
        }

        return view('palestras', ["palestras" => $palestras,"search"=>$search,"months"=>$months]);
    }


    public function store(Request $request)
    {
        $palestra = new Palestra();

        $palestra->name = $request->name;
        $palestra->info = $request->info;
        $palestra->date = $request->date;        

        $palestra->save();

        return redirect('/palestras')->with("msg", "Palestra adicionada com sucesso");
    }
}