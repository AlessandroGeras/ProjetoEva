<?php

namespace App\View\Components;

use Illuminate\View\Component;

class consultas_painel extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $user;
    public $consulta;
    public $months;

    public function __construct($user, $consulta, $months)
    {
        $this->user = $user;
        $this->consulta = $consulta;
        $this->months = $months;    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.consultas_painel');
    }
}
