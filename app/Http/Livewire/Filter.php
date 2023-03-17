<?php

namespace App\Http\Livewire;

use App\Models\Merchant;
use Livewire\Component;

class Filter extends Component
{
    public $selectedMerchant;
    public $checked = [];
    public $status = [];

    public $date_from, $to_date;

    public function render()
    {
        $this->emit('status', $this->status);
        $this->emit('selectedMerchant', $this->selectedMerchant);

        return view('livewire.filter', ['merchants' => Merchant::all()]);
    }
}
