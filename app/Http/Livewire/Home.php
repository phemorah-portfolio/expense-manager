<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Home extends Component
{

    public $test = 10;

    public function render()
    {

        return view('livewire.home');
    }
}
