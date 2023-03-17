<?php

namespace App\Http\Livewire;

use Livewire\Component;

class GlobalSearch extends Component
{
    public $search;
    public $paginate = 10;

    public function render()
    {
        $this->emit('paginate', $this->paginate);
        
        if($this->search){
            $this->emit('globalSearch', $this->search);
        }
        return view('livewire.global-search');
    }
}
