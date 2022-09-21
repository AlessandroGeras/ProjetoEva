<?php

namespace App\View\Components;

use Illuminate\View\Component;

class palestra_actions extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $palestra;
    public $inscrito;
    public $manyusers;
    public $user;

    public function __construct($palestra,$inscrito,$manyusers,$user)
    {
        $this->palestra = $palestra;
        $this->inscrito = $inscrito;
        $this->manyusers = $manyusers;
        $this->user = $user;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.palestra_actions');
    }
}
