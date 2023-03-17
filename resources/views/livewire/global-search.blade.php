<div class="row flex">
    <div class="col-md-2">
            <label for="paginate" class="text-nowrap mr-2 mb-0">Per Page</label>
            <select wire:model="paginate" name="paginate" id="paginate" class="form-control form-control-sm">
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
            </select>
    </div>
    <div class="col-md-8">
            <label for="paginate" class="text-nowrap mr-2 mb-0">General Search</label>
        <input type="search" wire:model.debounce.500ms="search" class="form-control form-item"
            placeholder="Search by merchant, amount, status...">
    </div>
</div>