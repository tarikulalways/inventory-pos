<label for="customer">Select Customer <span id="error" class="text-danger"></span></label>
<div class="input-group mb-3">
    <select onchange="getCutomer()" id="resetForm" class="form-select selectCustomer" aria-label="Default select example">
        <option selected>--Select--</option>
        @foreach ($customer as $customers)
            <option
            data-id="{{ $customers->id }}" data-name="{{ $customers->customerName }}" data-phone="{{ $customers->customerPhone }}" data-addr="{{ $customers->customerAddress }}"
            data-pastdue="{{ $customers->cusotmerPastDue }}"

            value="{{ $customers->id }}">{{ $customers->customerName }}</option>
        @endforeach
    </select>
    <button onclick="addCustomer()" class="btn btn-primary">Add Customer</button>
</div>

{{-- customer add modal --}}
<div class="modal fade" id="customerModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Customer</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="field-group">
                        <label for="customerName">Customer Name</label>
                        <input type="text" id="customerName" class="form-control">
                        <span class="name text-danger"></span>
                    </div>
                    <div class="field-group">
                        <label for="customerPhone">Customer Phone</label>
                        <input type="text" id="customerPhone" class="form-control">
                        <span class="phone text-danger"></span>
                    </div>
                    <div class="field-group">
                        <label for="customerAddr">Customer Address</label>
                        <input type="text" id="customerAddr" class="form-control">
                        <span class="addr text-danger"></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a onclick="addNewCustomer()" class="btn btn-submit me-2">Submit</a>
                <a class="btn btn-cancel"  data-bs-dismiss="modal">Cancel</a>
            </div>
        </div>
    </div>
</div>

{{-- custome addes success alert --}}
<div class="modal fade" id="customerAddModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title text-bold text-center text-success" id="customerAddS"></p>
            </div>
        </div>
    </div>
</div>
