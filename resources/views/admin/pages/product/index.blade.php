@extends('master')
@section('title', 'Product List')
@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Product List</h4>
                <h6>Manage your Product</h6>
            </div>
            <div class="page-btn">
                <a href="{{ 'create.producct' }}" class="btn btn-added">
                    <img src="assets/img/icons/plus.svg" class="me-1" alt="img">Add Product
                </a>
            </div>
        </div>
        @if (session()->has('update'))
            <div class="alert alert-success">{{ session('update') }}</div>
            @elseif (session()->has('destroy'))
            <div class="alert alert-danger">{{ session('destroy') }}</div>
        @endif
        <div class="card">
            <div class="card-body">
                <div class="card" id="filter_inputs">
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" placeholder="Enter Brand Name">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" placeholder="Enter Brand Description">
                                </div>
                            </div>
                            <div class="col-lg-1 col-sm-6 col-12 ms-auto">
                                <div class="form-group">
                                    <a class="btn btn-filters ms-auto"><img src="assets/img/icons/search-whites.svg"
                                            alt="img"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="fresh" class="table-responsive">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <table class="table datanew dataTable no-footer" id="DataTables_Table_0" role="grid"
                                aria-describedby="DataTables_Table_0_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1" aria-sort="ascending"
                                            aria-label="SL: activate to sort column descending" style="width: 17.8906px;">SL
                                        </th>

                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" aria-label="Categoyr_img: activate to sort column ascending"
                                            style="width: 93.5312px;">Product Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" aria-label="Categoyr_img: activate to sort column ascending"
                                            style="width: 93.5312px;">Produt Category</th>

                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" aria-label="Categoyr_img: activate to sort column ascending"
                                            style="width: 93.5312px;">MinQty</th>

                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" aria-label="Categoyr_img: activate to sort column ascending"
                                            style="width: 93.5312px;">MaxQty</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" aria-label="Categoyr_img: activate to sort column ascending"
                                            style="width: 93.5312px;">Purchase Price</th>

                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" aria-label="Categoyr_img: activate to sort column ascending"
                                            style="width: 93.5312px;">Sale Price</th>

                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" aria-label="Categoyr_img: activate to sort column ascending"
                                            style="width: 93.5312px;">Supplier</th>

                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" aria-label="Categoyr_img: activate to sort column ascending"
                                            style="width: 93.5312px;">Product Code</th>


                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" aria-label="Action: activate to sort column ascending"
                                            style="width: 45.0938px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $item['productName'] }}</td>
                                            <td>{{ $item['category']['categoryName'] }}</td>
                                            <td>{{ $item['minQty'] }}</td>
                                            <td>{{ $item['maxQty'] }}</td>
                                            <td>{{ $item['purchasePrice'] }}</td>
                                            <td>{{ $item['salePrice'] }}</td>
                                            <td>{{ $item['supplier']['supplierName'] }}</td>
                                            <td>{{ $item['productCode'] }}</td>
                                            <td>
                                                <a class="me-3" href="{{ route('edit.producct', ['product'=>$item->id]) }}">
                                                    <img src="assets/img/icons/edit.svg" alt="img">
                                                </a>

                                                <a onclick="return confirm('Are you sure delete data?')" class="me-3" href="{{ route('destroy.producct', ['product'=>$item->id]) }}">
                                                    <img src="assets/img/icons/delete.svg" alt="img">
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
