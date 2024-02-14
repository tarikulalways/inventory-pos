@extends('master')
@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Product Add</h4>
                <h6>Create new product</h6>
            </div>
        </div>
        @if (session()->has('store'))
            <div class="alert alert-success">{{ session('store') }}</div>
        @endif
        <div class="card">
            <div class="card-body">
                <form action="{{ route('store.producct') }}" method="POST">
                    <div class="row">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input name="productName" type="text">
                                    @error('productName')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="categoryId" class="form-control" class="select select2-hidden-accessible">
                                        <option>-- Select Category --</option>
                                        @foreach ($category as $item)
                                            <option value="{{ $item['id'] }}">{{ $item['categoryName'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('categoryId')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Minimum Qty</label>
                                    <input name="minQty" type="text">
                                    @error('minQty')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input name="maxQty" type="text">
                                    @error('maxQty')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Purchase Price</label>
                                    <input name="purchasePrice" type="text">
                                    @error('purchasePrice')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Sale Price</label>
                                    <input name="salePrice" type="text">
                                    @error('salePrice')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Supplier</label>
                                    <select name="supplierId" class="form-control" class="select select2-hidden-accessible">
                                        <option>-- Select Supplier --</option>
                                        @foreach ($supplier as $item)
                                            <option value="{{ $item['id'] }}">{{ $item['supplierName'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('supplierId')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label> Product Code</label>
                                    <input name="productCode" class="form-control" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button class="btn btn-submit me-2">Add Product</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
