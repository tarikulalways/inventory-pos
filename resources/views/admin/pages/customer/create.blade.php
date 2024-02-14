@extends('master')
@section('title', 'Add Customer')
@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Add Customer</h4>
                <h6>Create New Customer</h6>
            </div>
        </div>
        @if (session()->has('store'))
            <div class="alert alert-success">{{ session('store') }}</div>
        @endif
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <form action="{{ route('store.customer') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Customer Name</label>
                                    <input name="customerName" type="text">
                                    @error('customerName')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Customer Phone</label>
                                    <input name="customerPhone" type="text">
                                    @error('customerPhone')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Customer Address</label>
                                    <input name="customerAddress" type="text">
                                    @error('customerAddress')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Customer Due</label>
                                    <input name="cusotmerPastDue" type="text">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Customer Due</label>
                                    <input name="payAbleDate" class="form-control" type="date">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-submit me-2">Add Customer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
