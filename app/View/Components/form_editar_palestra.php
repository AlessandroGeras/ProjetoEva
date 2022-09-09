<?php

namespace App\View\Components;

use Illuminate\View\Component;

class form_editar_palestra extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

     public $palestra;	

    public function __construct($palestra)
    {
        $this->palestra = $palestra;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form_editar_palestra');
    }
}
