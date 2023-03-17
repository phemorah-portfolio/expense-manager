<!-- Insert Modal -->
<div wire:ignore.self class="modal fade" id="expenseModal" tabindex="-1" aria-labelledby="expenseModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="expenseModalLabel">Add Expense</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="saveExpense">
                <div class="modal-body">
                    <div class="flex flex-wrap -mx-3 mb-6">

                    <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">Merchant</label>
      <div class="relative">
        <select class="form-control_ form-control-sm_ block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" wire:model="merchant_id">
          <option value="">Select</option>
          @foreach($merchants as $merchant)
            <option value="{{ $merchant->id }}">{{ $merchant->name }}</option>
            @endforeach
            </select>
            @error('merchant_id') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
      </div>
    <!-- </div> -->
                    </div>

                    <div class="w-full md:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
      Status
      </label>
      <select class="form-control_ form-control-sm_ block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" wire:model="status">
          <option value="">Select</option>
            <option value="New">New</option>
            <option value="In Progress">In Progress</option>
            <option value="Reimbursed">Reimbursed</option>
          </select>
            @error('status') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
    </div>

    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
      Total
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="₦" wire:model="total">
        @error('total') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror

    </div>
    <div class="w-full md:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
      Date
      </label>
      
      <x-datetime-picker
      placeholder="Appointment Date"
      parse-format="YYYY-MM-DD HH:mm"
      wire:model.defer="date"
      class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
      />
      @error('date') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
    </div>

    <div class="w-full md:w-1/2_ px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
      Comment
      </label>
      <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="comment" wire:model="comment"></textarea>
        @error('comment') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
    </div>

    <div class="w-full md:w-1/2_ px-3 mb-6 md:mb-0">
    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 mt-5" for="grid-first-name">
      Upload Receipt
      </label>
      @if($receipt)<img src="{{ $receipt }}" width="100" />@endif
      <input type="file" id="image" wire:change="$emit('receiptChosen')" class="appearance-none block w-ful bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" />
      @error('image') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
</div>

  </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>

        </div>
    </div>
</div>