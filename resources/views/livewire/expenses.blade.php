<div>
        <div class="row col-md-6 ml-1">
            <livewire:global-search />
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
