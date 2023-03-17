<div>
    <div class="row flex justify-content-between">
        <div class="row col-md-6">
            <div class="col-md-3">
                <button type="button" class="ml-2 float-left bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded float-end" data-bs-toggle="modal" data-bs-target="#importModal">
                    Import
                </button>
            </div>
            <div class="col-md-4">
                <button type="button" class="ml-5_ float-left bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded float-end" data-bs-toggle="modal" data-bs-target="#expenseModal">
                    New Expense
                </button>
            </div>
        </div>
        <div class="row col-md-6 ml-1">
            <livewire:global-search />
        </div>
    </div>

    <hr class="my-1"></hr>

    <div class="row flex justify-content-between align-content-center mb-2">

        <div class="col-md-3 max-h-600 overflow-y-auto">
        <livewire:filter />
        </div>
        <!-- End search column -->

        <div class="col-md-7 max-h-23 overflow-y-auto">
            <div class="col-m10 mt-3">
                @include('layouts.includes.livewire_flash_messages')
            </div>
            <livewire:table />
        </div>

        <!-- End Table Colummn -->
        <div class="col-md-2">
            <p class="">To be reimbursed</p>
            <h1>₦2,000</h1>
        </div><!-- End Reinbursment Column -->
    </div>

    @include('livewire.expenseModal')
    @include('livewire.importModal')

</div>

<script>
    window.livewire.on('receiptChosen', () => {
        let inputField = document.getElementById('image')
        let file = inputField.files[0]
        let reader = new FileReader();

        reader.onloadend = () => {
            window.livewire.emit('receiptUpload', reader.result)
        }

        reader.readAsDataURL(file);
    })
</script>