<?php

namespace Tomatophp\TomatoKetchup\Services;

use Illuminate\View\Component;

class Widget extends Component
{
    public function render()
    {
        return view('tomato-ketchup::widgets.widget');
    }
}
