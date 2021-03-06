<?php

namespace App\View\Components;

use Illuminate\View\Component;

class btn extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

     public $title;
     public $countervalue;

    public function __construct($title,$countervalue)
    {
        $this->title = $title;
        $this->countervalue = $countervalue;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.btn');
    }
}
