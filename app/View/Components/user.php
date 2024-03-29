<?php

namespace App\View\Components;

use Illuminate\View\Component;

class user extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $user;
    public $currentUser;
    public $manypalestras;
    public $permission;

    public function __construct($currentUser,$user,$manypalestras,$permission)
    {        
        $this->currentUser = $currentUser;
        $this->user = $user;
        $this->manypalestras = $manypalestras;
        $this->permission = $permission;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.user');
    }
}
