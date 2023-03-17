<!-- Insert Modal -->
<div wire:ignore.self class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="importModalLabel">Import Excel</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="saveImport">
                <div class="modal-body">
                    <div class="flex flex-wrap -mx-3 mb-6">


    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">

      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="file" wire:model="excelFile">
      @error('excelFile') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
      <br><small><strong>File Type:</strong> xlsx, xls</small>
    </div>
  </div>
  <a href="{{ asset('sample-expense-doc.xlsx')}}" class="btn btn-sm btn-success">Sample Template</a>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Import</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>

        </div>
    </div>
</div>