@extends('master')
@section('title', 'Due Customer List')
@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Due Customer List</h4>
                <h6>Manage your Due Customer</h6>
            </div>
        </div>
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
                                            style="width: 93.5312px;">Customer Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" aria-label="Categoyr_img: activate to sort column ascending"
                                            style="width: 93.5312px;">Customer Phone</th>

                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" aria-label="Categoyr_img: activate to sort column ascending"
                                            style="width: 93.5312px;">Customer Address</th>

                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" aria-label="Categoyr_img: activate to sort column ascending"
                                            style="width: 93.5312px;">Customer Due</th>

                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" aria-label="Action: activate to sort column ascending"
                                            style="width: 45.0938px;">Payable Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customerDue as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $item['customer']['customerName'] }}</td>
                                            <td>{{ $item['customer']['customerPhone'] }}</td>
                                            <td>{{ $item['customer']['customerAddress'] }}</td>
                                            <td>{{ $item['customer']['cusotmerPastDue'] }}</td>

                                            <td>{{ $item['payAbleDate'] }}</td>
                                            
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
