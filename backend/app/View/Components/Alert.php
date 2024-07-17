<?php

namespace App\View\Components;

use Illuminate\View\View;
use Illuminate\View\Component;

class Alert extends Component
{

    public function __construct(public string $type)
    {
    }

    public function render(): View
    {
        return view('components.alert');
    }
}
