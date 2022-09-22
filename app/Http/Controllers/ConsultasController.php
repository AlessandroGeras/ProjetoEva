<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Consulta;

class ConsultasController extends Controller
{
    public function store(Request $request)
    {
        $user = User::findOrFail($request->id);

        $consulta = new Consulta;
        $consulta->user_id = $user->id;
        $consulta->consulta = $request->consulta;
        $consulta->profissional = $request->profissional;
        $consulta->date = $request->date;
        $consulta->link = $request->link;
        $consulta->save();

        return redirect()->back()->with("msg", "Consulta cadastrada com sucesso");
    }


    public function show($id)
    {
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

        $consulta = Consulta::findOrFail($id);        

        $user = User::findOrFail($consulta->user_id);

        return view('consulta', ["user" => $user, "consulta" => $consulta,"months"=>$months]);
    }
}
