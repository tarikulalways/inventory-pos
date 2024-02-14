@extends('master')
@section('title', 'Edit return money')
@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Edit return Money</h4>
                <h6>Edit new return money</h6>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <form action="{{ route('update.return', ['returnInvoice'=>$returnInvoice->id]) }}" method="POST">
                        @csrf
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
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
                                <label>Amount</label>
                                <input name="subTotal" value="{{ $returnInvoice['subTotal'] }}" type="text">
                                @error('subTotal')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Return Money</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
