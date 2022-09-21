<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warning;

class WarningsController extends Controller
{
    public function store(Request $request)
    {
        $warning = new Warning;

        $warning->warning = $request->warning;
        $warning->date = $request->date; 
        
        $warning->save();

        return redirect('/dashboard')->with("msg", "Aviso geral criado");
    }


    public function destroy($id)
    {
        Warning::findOrFail($id)->delete();

        return redirect('/dashboard')->with("msg", "Aviso geral excluído com sucesso");
    }
}
