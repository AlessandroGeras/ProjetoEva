<?php

namespace App\View\Components;

use Illuminate\View\Component;

class notifications extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $manyconsultas;

    public function __construct($manyconsultas)
    {
        $this->manyconsultas = $manyconsultas;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.notifications');
    }
}
