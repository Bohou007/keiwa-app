<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LiveHomeController extends Component
{
    public $showDiv = false;

    public function render()
    {
        return view('form');
    }

    public function openDiv()
    {
        $this->showDiv != $this->showDiv;
    }
}
