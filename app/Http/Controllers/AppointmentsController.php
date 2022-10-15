<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Appointment;

use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
    public function store(Request $request)
    {
        $user = User::findOrFail($request->id);

        $appointment = new Appointment;
        $appointment->user_id = $user->id;
        $appointment->appointment = $request->appointment;
        $appointment->professional = $request->professional;
        $appointment->date = $request->date;
        $appointment->link = $request->link;
        $appointment->save();

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

        $appointment = Appointment::findOrFail($id);        

        $user = User::findOrFail($appointment->user_id);

        return view('appointment', ["user" => $user, "appointment" => $appointment,"months"=>$months]);
    }
}