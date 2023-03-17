<?php

namespace App\Http\Livewire;

use App\Models\Merchant;
use App\Models\Expense;
use Livewire\Component;
use Livewire\WithPagination;

use Livewire\WithFileUploads;
use App\Imports\ExpenseImport;
use Maatwebsite\Excel\Facades\Excel;

use Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class Expenses extends Component
{
    use WithFileUploads;

    public $total, $date, $comment, $merchant_id, $status, $checked, $sections, $selectedMerchant;
    public $selectedSection = null;
    public $selectAll = false;

    public $excelFile, $receipt;


    public $listeners = [
        'selectedMerchant' => 'selectedMerchant',
        'receiptUpload' => 'handleReceiptUpload'
    ];

    use WithPagination;

    public function storeReceipt(){

        if(!$this->receipt) return null;

        $img = Image::make($this->receipt)->encode('jpg');
        $name = Str::random().'_expense_receipt.jpg';
        Storage::disk('public')->put($name, $img);

        return $name;
    }

    public function handleReceiptUpload($imageData){
        $this->receipt = $imageData;
    }

    public function saveImport(){
        $this->validate([
            'excelFile' => 'required|mimes:xlsx, xls'
        ]);

        Excel::import(new ExpenseImport, $this->excelFile);
        session()->flash('success', 'Expenses were imported successfully');

        $this->dispatchBrowserEvent('close-modal');
    }
    public function selectedMerchant($selectedMerchant){

        $this->selectedMerchant = $selectedMerchant;
    }

    public function rules(){
        return [
            'total' => 'required|integer',
            'date' => 'required|date',
            'status' => 'required|string',
            'comment' => 'required|min:3',
            'merchant_id' => 'required|integer',
        ];
    }

    public function updated($fields){
        $this->validateOnly($fields);
    }

    public function saveExpense(){
        $validatedData = $this->validate();
        // dd($validatedData);
        $receipt = $this->storeReceipt();
        $validatedData['receipt'] = $receipt;
        Expense::create($validatedData);
        $this->receipt = '';
        session()->flash('success', 'New Expense added Successfully!');
        $this->resetInputs(); //Reset all inputs
        $this->dispatchBrowserEvent('close-modal');
    }

    public function resetInputs(){
        $this->total = '';
        $this->date = '';
        $this->comment = '';
        $this->merchant_id = '';
    }


    public function deleteSingleExpense($expense_id){
        $expense = Expense::findOrFail($expense_id)->delete();
        session()->flash('info', 'Record deleted Successfully!');
    }

    public function deleteRecords(){
        Expense::whereKey($this->checked)->delete();
        $this->checked = [];
        session()->flash('info', 'Selected Expenses were deleted successfully!');
    }

    public function render()
    {
        // if($this->selectedMerchant){
            // dd($this->selectedMerchant.'__p');
            $this->emit('selectedMerchantExpensesComponent', $this->selectedMerchant);
        // }
        return view('livewire.expenses', ['merchants' => Merchant::all()]);
    }
}
