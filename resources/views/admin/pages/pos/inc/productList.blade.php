<div class="col-md-7">
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
            <div class="table-responsive">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <table class="table datanew dataTable no-footer" id="DataTables_Table_0" role="grid"
                        aria-describedby="DataTables_Table_0_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" aria-label="Brand Description: activate to sort column ascending"
                                    style="width: 301.156px;">Add</th>


                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" aria-label="Brand Description: activate to sort column ascending"
                                    style="width: 301.156px;">ProductName</th>

                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" aria-label="Brand Description: activate to sort column ascending"
                                    style="width: 301.156px;">QTY</th>

                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" aria-label="Brand Description: activate to sort column ascending"
                                    style="width: 301.156px;">Purchase Price</th>

                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" aria-label="Brand Name: activate to sort column ascending"
                                    style="width: 178.781px;">Sale Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product as $products)
                                <tr class="odd">
                                    <td>
                                        <a
                                        data-id="{{ $products->id }}" data-name="{{ $products->productName }}"
                                    data-price="{{ $products->salePrice }}"
                                        data-maxqty="{{ $products->maxQty }}"

                                            class="p-2 btn btn-sm btn-primary me-2 getProduct"
                                            >

                                            <i style="font-size:20px; color:white" class="fa fa-shopping-cart"></i>

                                        </a>
                                    </td>
                                    <td>{{ $products->productName }}</td>
                                    <td>{{ $products->maxQty }}</td>
                                    <td>{{ $products->purchasePrice }}</td>
                                    <td>{{ $products->salePrice }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- product modal --}}
<div class="modal fade" id="ProductModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Product</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="field-group">
                        <input class="" type="text" id="maxQty">
                        <input class="" type="text" id="pId" class="form-control">
                    </div>
                    <div class="field-group">
                        <input class="d-none" type="text" id="pName" class="form-control">
                    </div>
                    <div class="field-group">
                        <label for="pPrice">Price</label>
                        <input type="text" id="pPrice" class="form-control">
                    </div>
                    <div class="field-group">
                        <label for="Qty">Qty</label>
                        <input type="text" id="Qty" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a onclick="addProduct()" class="btn btn-submit me-2">Submit</a>
                <a class="btn btn-cancel"  data-bs-dismiss="modal">Cancel</a>
            </div>
        </div>
    </div>
</div>

{{-- product quantity alert --}}
<div class="modal fade" id="stockAlert" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger">The product you ordered is not in stock</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <a class="btn btn-cancel"  data-bs-dismiss="modal">Ok</a>
            </div>
        </div>
    </div>
</div
