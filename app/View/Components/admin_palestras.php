<?php

namespace App\View\Components;

use Illuminate\View\Component;

class admin_palestras extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $palestras;

    public function __construct($palestras)
    {
        $this->palestras = $palestras;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin_palestras');
    }
}
