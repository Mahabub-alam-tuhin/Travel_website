<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public $style;

    public function __construct($style = 'primary')
    {
        $this->style = $style;
    }

    public function render()
    {
        return view('components.button');
    }
}
