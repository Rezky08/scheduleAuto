<?php

namespace App\View\Components;

use Illuminate\View\Component;

class searchbox extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the components.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.searchbox');
    }
}
