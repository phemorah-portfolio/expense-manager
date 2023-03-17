<div>
@if ($selectPage)
<div class="col-m10 mb-2">
@if ($selectAll)
<div>
    You have selected all <strong>{{ $expenses->total() }}</strong> items.
</div>
@else
<div>
    You have selected <strong>{{ count($checked) }}</strong> items, Do you want to Select All
    <strong>{{ $expenses->total() }}</strong>?
    <a href="#" class="ml-2" wire:click="selectAll">Select All</a>
</div>
@endif
</div>
@endif

<div class="col-md-12">
    @if ($checked)
    <div class="dropdown ml-4">
        <button class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">With Checked
            ({{ count($checked) }})</button>
        <div class="dropdown-menu">
            <a href="#" class="dropdown-item" type="button"
                onclick="confirm('Are you sure you want to delete these Records?') || event.stopImmediatePropagation()"
                wire:click="deleteRecords()">
                Delete
            </a>
            <a href="#" class="dropdown-item" type="button"
                onclick="confirm('Are you sure you want to export these Records?') || event.stopImmediatePropagation()"
                wire:click="exportSelected()">
                Export
            </a>
        </div>
    </div>
    @endif
</div>

    <button type="button" class="ml-2 float-left bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded float-end" data-bs-toggle="modal" data-bs-target="#importModal">
        Import
    </button>
    <button type="button" class="ml-5_ float-left bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded float-end" data-bs-toggle="modal" data-bs-target="#expenseModal">
        New Expense
    </button>

<div class="flex carbody table-responsive p-0">
<table class="table table-hover">
<tbody>
    <tr>
        <th><input type="checkbox" wire:model="selectPage"></th>
        <th>Date</th>
        <th>Merchant</th>
        <th>Total</th>
        <th>Status</th>
        <th>Comment</th>
        <th></th>
    </tr>
    @foreach($expenses as $expense)
    <tr class="@if ($this->isChecked($expense->id)) table-primary @endif" wire:click="">
        <td><input type="checkbox" value="{{ $expense->id }}" wire:model="checked"></td>
        <td>{{ Carbon\Carbon::parse($expense->date)->diffForHumans() }}</td>
        <td>{{ $expense->merchant->name }}</td>
        <td>₦{{ $expense->total }}</td>
        <td>{{ $expense->status }}</td>
        <td style="max-width: 250px">{{ $expense->comment }}</td>
        <td><button class="btn btn-danger btn-sm" onclick="confirm('Are you sure you want to delete this record?') }} event.stopImmediatePropagation()"
        wire::click="deleteSingleRecord({{ $expense->id }})"><i class="fa fa-trash" area-hidden="true"></i></button></td>
    </tr>
    @endforeach
</tbody>
</table>
<!-- <div class="row mt-4">
<div class="col-sm-6 offset-5">
    {{-- $expenses->links() --}}
</div>
</div> -->
</div>
</div>