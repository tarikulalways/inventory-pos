@extends('master')
@section('title', 'Edit receive money')
@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Edit Receive Money</h4>
                <h6>Edit new receive money</h6>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <form action="{{ route('update.customerMoney', ['customerReceiveMoney'=>$customerReceiveMoney->id]) }}" method="POST">
                        @csrf

                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="">Select Customer</label>
                                <select name="customerId" class="form-select" aria-label="Default select example">
                                    @foreach ($customer as $item)
                                        <option value="{{ $item['id'] }}">{{ $item['customerName'] }}</option>
                                    @endforeach
                                </select>
                                @error('customerId')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Receive Amount</label>
                                <input name="receiveMoney" value="{{ $customerReceiveMoney['receiveMoney'] }}" type="text">
                                @error('receiveMoney')
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
