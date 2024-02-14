@extends('master')
@section('title', 'Edit Supplier')
@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Edit Supplier</h4>
                <h6>Edit New Supplier</h6>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <form action="{{ route('update.supplier', ['supplier'=>$supplier->id]) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Supplier Name</label>
                                    <input name="supplierName" value="{{ $supplier['supplierName'] }}" type="text">
                                    @error('supplierName')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Supplier Phone</label>
                                    <input name="supplierPhone" value="{{ $supplier['supplierPhone'] }}" type="text">
                                    @error('supplierPhone')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Supplier Address</label>
                                    <input name="supplierAddress" value="{{ $supplier['supplierAddress'] }}" type="text">
                                    @error('supplierAddress')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Supplier Due</label>
                                    <input name="pasDue" value="{{ $supplier['pasDue'] }}" type="text">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Supplier Due</label>
                                    <input name="payAbleDate" class="form-control" type="date">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-submit me-2">Edit Supplier</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
