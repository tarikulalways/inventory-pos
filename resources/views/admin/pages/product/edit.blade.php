@extends('master')
@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Product Edit</h4>
                <h6>Edit new product</h6>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('update.producct', ['product' => $product->id]) }}" method="POST">
                    <div class="row">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input name="productName" value="{{ $product['productName'] }}" type="text">
                                    @error('productName')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="categoryId" class="form-control" class="select select2-hidden-accessible">
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
                                    <input name="minQty" value="{{ $product['minQty'] }}" type="text">
                                    @error('minQty')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input name="maxQty" value="{{ $product['maxQty'] }}" type="text">
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
                                    <input name="purchasePrice" value="{{ $product['purchasePrice'] }}" type="text">
                                    @error('purchasePrice')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Sale Price</label>
                                    <input name="salePrice" value="{{ $product['salePrice'] }}" type="text">
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
                                    <input name="productCode" value="{{ $product['productCode'] }}" class="form-control"
                                        type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button class="btn btn-submit me-2">Edit Product</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
