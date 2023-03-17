<?php

namespace App\Http\Livewire;

use App\Models\Expense;
use Livewire\Component;

class Table extends Component
{

    public $selectPage = false;
    public $selectedMerchant;
    public $paginate = 10;
    public $checked = [];
    public $status = [];
    public $search;

    public $listeners = [
        'selectedMerchantExpensesComponent' => 'selectedMerchant',
        'paginate' => 'paginate',
        'globalSearch' => 'globalSearch',
        'status' => 'filterByStatus',
    ];

    public function filterByStatus($status){
        $this->status = $status;
    }

    public function globalSearch($search = null){
        $this->search = $search;
    }

    public function paginate($count){
        $this->paginate = $count;
    }

    public function selectedMerchant($selectedMerchant)
    {
        $this->selectedMerchant = $selectedMerchant > 0 ? $selectedMerchant : false;
    }

    public function isChecked($expense_id){
        return in_array($expense_id, $this->checked);
    }

    public function render()
    {
        $expenses = Expense::with(['merchant'])
        ->when($this->selectedMerchant, function($query){
            $query->where('merchant_id', $this->selectedMerchant);
        })
        ->when($this->status, function($query){
            $query->whereIn('status', $this->status);
        })
        ->when(trim($this->search), function($query){
            $query->search(trim($this->search));
        })
        ->paginate($this->paginate);

        return view('livewire.table', compact('expenses'));
    }
}
