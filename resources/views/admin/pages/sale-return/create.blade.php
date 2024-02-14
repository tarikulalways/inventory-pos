@extends('master')
@section('title', 'Add return money')
@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Add return Money</h4>
                <h6>Create new return money</h6>
            </div>
        </div>
        @if (session()->has('store'))
            <div class="alert alert-success">{{ session('store') }}</div>
        @endif
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <form action="{{ route('store.return') }}" method="POST">
                        @csrf
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <select name="customerId" class="form-select" aria-label="Default select example">
                                    <option selected>-- Select Customer --</option>
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
                                <input name="subTotal" type="text">
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
