<div class="modal fade" id="details-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Invoice</h1>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="invoice" class="modal-body p-3">
                <div class="container-fluid">
                    <h2 class="text-center">بسم الله حره منير رحيم</h2>
                    <h2 class="text-center"><strong>RR AUTO HOUSE</strong></h2>
                    <hr>
                    <div class="row">
                        <div class="col-8">
                            <strong class="text-bold text-dark">BILLED TO </strong>
                            <p class="text-xs mx-0 my-1">Name: <span id="CName"></span> </p>
                            <p class="text-xs mx-0 my-1">Phone: <span id="CPhone"></span></p>
                            <p class="text-xs mx-0 my-1">Address: <span id="CAdd"></span> </p>
                        </div>
                        <div class="col-4">
                            <strong class="text-bold mx-0 my-1 text-dark">Invoice </strong>
                            <p class="text-xs mx-0 my-1">Date: {{ date('Y-m-d') }} </p>
                        </div>
                    </div>
                    <hr class="mx-0 my-2 p-0 bg-secondary" />
                    <div class="row">
                        <div class="col-12">
                            <table class="table w-100" id="invoiceTable">
                                <thead class="w-100">
                                    <tr class="text-xs text-bold">
                                        <td>SL</td>
                                        <td>Name</td>
                                        <td>Qty</td>
                                        <td>Price</td>
                                        <td>Total</td>
                                    </tr>
                                </thead>
                                <tbody class="w-100" id="invoiceList">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr class="mx-0 my-2 p-0 bg-secondary" />
                    <div class="row">
                        <div class="col-12">
                            <p class="text-bold text-xs my-1 text-dark"> Sub Total: <i class="bi bi-currency-dollar"></i>
                                <span id="subtotal"></span>
                            </p>
                            <p class="text-bold text-xs my-2 text-dark"> Discount: <i class="bi bi-currency-dollar"></i>
                                <span id="discount"></span></p>

                            <p class="text-bold text-xs my-1 text-dark"> Total: <i class="bi bi-currency-dollar"></i>
                                <span id="total"></span></p>

                            <p class="text-bold text-xs my-1 text-dark"> Customer get product Price: <i class="bi bi-currency-dollar"></i>
                                    <span id="cgpp"></span></p>

                            <p class="text-bold text-xs my-1 text-dark"> Receive Money: <i class="bi bi-currency-dollar"></i>
                                <span id="receiveMoney"></span></p>

                            <p class="text-bold text-xs my-1 text-dark"> Past Due: <i class="bi bi-currency-dollar"></i>
                                    <span id="pastDue"></span></p>

                            <p class="text-bold text-xs my-1 text-dark"> Total Due: <i class="bi bi-currency-dollar"></i>
                                        <span id="totalDue"></span></p>

                            <p class="text-bold text-xs my-1 text-dark"> Due Payment Date: <i class="bi bi-currency-dollar"></i>
                                        <span id="duePaymenDate"></span></p>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button onclick="PrintPage()" class="btn btn-primary">Print</button>
            </div>
        </div>
    </div>
</div>
