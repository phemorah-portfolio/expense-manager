<div>
<div class="col-md-12 py-2">
        <label for="paginate" class="text-nowrap mr-2 mb-0">From</label>
        <x-datetime-picker
      placeholder="From Date"
      parse-format="YYYY-MM-DD HH:mm"
      wire:model.defer="date_from"
      class="appearance-none block w-full_ bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-2 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
      />
</div>
<div class="col-md-12 py-2">
        <label for="paginate" class="text-nowrap mr-2 mb-0">To</label>
        <x-datetime-picker
      placeholder="To Date"
      parse-format="YYYY-MM-DD HH:mm"
      wire:model.defer="to_date"
      class="appearance-none block w-full_ bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-2 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
      />
</div>

<div class="flex flex-wrap mx-3 mb-6">
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name"> Min </label>
        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-1 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-min" type="text" placeholder="₦" wire:model="min">
    </div>
    <div class="w-full md:w-1/2 px-3">
        <label class="block uppercase tracking-widetext-gray-700 text-xs font-bold mb-2" for="grid-last-name"> Max </label>
        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-1 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-max" type="text" placeholder="₦" wire:model="max">
    </div>
</div>

<div class="col-md-12">
        <label for="merchant" class="text-nowrap mr-2 mb-0">Merchant</label>
        <select class="form-control form-control-sm" wire:model="selectedMerchant">
            <option value="0">All Merchant</option>
            @foreach($merchants as $merchant)
            <option value="{{ $merchant->id }}">{{ $merchant->name }}</option>
            @endforeach
        </select>
</div>
<div class="col-md-12 flex_ _justify-content-between">
        <label for="status" class="text-nowrap mr-2 mb-0">Status</label>
            <div class="flex items-center">
                <input id="default-checkbox" type="checkbox" wire:model="status" value="New" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">New</label>
            </div>
            <div class="flex items-center">
                <input checked id="checked-checkbox" type="checkbox" wire:model="status" value="In Progress" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="checked-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">In Progress</label>
            </div>
            <div class="flex items-center">
                <input checked id="checked-checkbox" type="checkbox" wire:model="status" value="Reimbursed" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="checked-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Reimbursed</label>
            </div>
</div>

</div>