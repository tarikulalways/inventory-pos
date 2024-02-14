@extends('master')
@section('title', 'Payment money')
@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Edit Payment Money</h4>
                <h6>Edit new Payment money</h6>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <form action="{{ route('update.smoney', ['supplierPayment'=>$supplierPayment->id]) }}" method="POST">
                        @csrf

                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="">Select Supplier</label>
                                <select name="supplierId" class="form-select" aria-label="Default select example">
                                    @foreach ($supplier as $item)
                                        <option value="{{ $item['id'] }}">{{ $item['supplierName'] }}</option>
                                    @endforeach
                                </select>
                                @error('supplierId')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Receive Amount</label>
                                <input name="supplierPayment" value="{{ $supplierPayment['supplierPayment'] }}" type="text">
                                @error('supplierPayment')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Edit Receive Money</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
