<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Palestra;
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
        } else {
            $palestras = Palestra::where('date', '>=', date("Y-m-d H:i"))->orderBy('date', 'desc')->get();
            //$palestras = Palestra::all()->sortByDesc("date");
        }

        return response()->view('palestras', ["palestras" => $palestras, "search" => $search, "months" => $months])->setStatusCode(200);
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

        $user = auth()->user();

        $manypalestras = $user->palestras;

        $manyusers = $palestra->users;

        return view('palestra', ["palestra" => $palestra, "months" => $months, "manypalestras" => $manypalestras, "manyusers" => $manyusers]);
    }

    public function store(Request $request)
    {
        $palestra = new Palestra();

        $palestra->name = $request->name;
        $palestra->info = $request->info;
        $palestra->date = $request->date;

        $palestra->save();

        return redirect('palestras')->with("msg", "Palestra adicionada com sucesso");
    }
}
