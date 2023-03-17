<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class AddExpense extends Component
{
    // public $form = [
    //     'total' => 0,
    //     'date' => '',
    //     'comment' => '',
    //     'merchant' => ''
    // ];

    // public function saveExpense()
    // {
    //     $this->emit('saveExpense');
    //     dd($this->form);
    // }

    // public function closeModal(){
    //     $this->emit('closeModal');
    //     dd('closed');
    // }


    public function render()
    {
        return view('livewire.add-expense');
    }
}
