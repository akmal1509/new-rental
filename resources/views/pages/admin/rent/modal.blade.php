<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Rent Code : {{ $data->code }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Customer Name : {{ $data->customerName }}</p>
                <p>Customer Phone : {{ $data->customerPhone }}</p>
                <p>Total Price : @money($data->price, 'USD', true)</p>
                <p>Payment Price : @money($data->totalPayment, 'USD', true)</p>
                <p>Remaining Payment : <span class="text-danger font-weight-bold">-@money($data->remainingPayment, 'USD', true)</span></p>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
