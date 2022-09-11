<?php

namespace App\View\Components;

use Illuminate\View\Component;

class palestra_nome extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $palestra;
    public $day;
    public $month;
    public $hours;
    public $minutes; 

    public function __construct($palestra,$day,$month,$hours,$minutes)
    {
        $this->palestra = $palestra;
        $this->day = $day;
        $this->month = $month;
        $this->hours = $hours;
        $this->minutes = $minutes;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.palestra_nome');
    }
}
