<div class="card" id="types">
    <div class="card-body">
        <div class="row pb-3">
            <div class="col-8">
                <strong class="text-bold text-dark">BILLED TO </strong>
                <p class="text-xs mx-0 my-1 d-none"><span id="cId"></span> </p>
                <p class="text-xs mx-0 my-1">Name: <span id="CName"></span> </p>
                <p class="text-xs mx-0 my-1">Phone: <span id="CPhone"></span></p>
                <p class="text-xs mx-0 my-1">Address: <span id="CAdd"></span> </p>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-nowrap mb-0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>QTY</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="productList">

                </tbody>
            </table>
        </div>
        <br>
        <br>
        <hr>
        <div class="row">
            <div class="pb-2">
                <div class="row pb-3">
                    <div class="col-md-6">
                        <strong class="text-dark">Sub Total:</strong>
                        <span id="subTotal"></span>
                    </div>
                    <div class="col-md-6">
                        <strong class="text-dark">Total Payable:</strong>
                        <span id="TotalPay"></span>
                    </div>
                </div>
            </div>

            <div class="field-group">
                <div class="row">
                    <div class="col-md-6">
                        <div class="pb-2">
                            <label for="tax">what you get product?</label>
                            <input onchange="cgetProduct()" type="text" id="cgetPN" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="pb-2">
                            <label for="tax">Product Qty</label>
                            <input onchange="cgetProduct()" type="text" id="cgetPQ" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="pb-2">
                            <label for="tax">How much is the total Tk</label>
                            <input onchange="cgetProduct()" type="text" id="cgetPP" class="form-control">
                        </div>
                    </div>
                </div>


                <div class="pb-2">
                    <label for="discount">Discount</label>
                    <input onchange="discountCal()" type="text" id="disCount" class="form-control">
                </div>
                <div class="pb-2">
                    <label for="tax">Receive Money</label>
                    <input onchange="recevieMony()" type="text" id="recevieMony" class="form-control">
                    <span id="notgetMoney" class="text-danger"></span>
                </div>
                <div class="pb-2">
                    <label for="tax">Due Money</label>
                    <input type="text" readonly id="dueMony" class="form-control">
                </div>
                <div class="pb-2">
                    <label for="tax">Due Payment Date</label>
                    <input onclick="createInvoice()" type="date" id="duePaymenDate" class="form-control">
                    <span id="dueDate" class="text-danger"></span>
                </div>
                <div class="py-3">
                    <button onclick="createInvoice()" class="btn btn-primary">Confirm</button>
                </div>
            </div>
        </div>
    </div>
</div>
