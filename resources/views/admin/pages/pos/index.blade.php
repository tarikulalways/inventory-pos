@extends('master')
@section('title', 'Sale List')
@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Sale List</h4>
                <h6>Manage your Sale</h6>
            </div>
        </div>
        @if (session()->has('destroy'))
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
                                            style="width: 93.5312px;">Print</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" aria-label="Categoyr_img: activate to sort column ascending"
                                            style="width: 93.5312px;">Customer Name</th>

                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" aria-label="Categoyr_img: activate to sort column ascending"
                                            style="width: 93.5312px;">Customer Phone</th>

                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" aria-label="Categoyr_img: activate to sort column ascending"
                                            style="width: 93.5312px;">SubTotal</th>

                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" aria-label="Categoyr_img: activate to sort column ascending"
                                            style="width: 93.5312px;">Discount</th>

                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" aria-label="Categoyr_img: activate to sort column ascending"
                                            style="width: 93.5312px;">payable</th>

                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" aria-label="Categoyr_img: activate to sort column ascending"
                                            style="width: 93.5312px;">Receive</th>

                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" aria-label="Categoyr_img: activate to sort column ascending"
                                            style="width: 93.5312px;">Customer Due</th>

                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" aria-label="Action: activate to sort column ascending"
                                            style="width: 45.0938px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($invoice as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>

                                            <td>
                                                <a class="me-3 invoiceDetail"
                            data-invoiceid="{{ $item->id }}"
                            data-name="{{ $item->customer->customerName }}"
                        data-phone="{{ $item->customer->customerPhone }}"
                        data-addr="{{ $item->customer->customerAddress }}"
                        data-passdue="{{ $item->customer->cusotmerPastDue }}"
                        data-subtotal="{{ $item->subTotal }}"
                        data-totalpay="{{ $item->totalPayAble }}"
                        data-discount="{{ $item->disCount }}"
                        data-receivemoney="{{ $item->receiveMoney }}"
                        data-duemoney="{{ $item->dueMoney }}"
                        data-cgpn="{{ $item->customerGPN }}"
                        data-cgpq="{{ $item->customerGPQty }}"
                        data-cgpp="{{ $item->customerGPP }}"
                        data-deudate="{{ $item->duePaymentDate }}"

                        >

                                                    <img src="assets/img/icons/printer.svg" alt="img">
                                                    </a>
                                            </td>
                                            <td>{{ $item['customer']['customerName'] }}</td>
                                            <td>{{ $item['customer']['customerPhone'] }}</td>
                                            <td>{{ $item['subTotal'] }}</td>
                                            <td>{{ $item['discount'] }}</td>
                                            <td>{{ $item['totalPayAble'] }}</td>
                                            <td>{{ $item['receiveMoney'] }}</td>
                                            <td>{{ $item['dueMoney'] }}</td>
                                            <td>
                                                <a onclick="return confirm('Are you sure delete data?')" class="me-3" href="{{ route('destroy.invoice', ['invoice'=>$item->id]) }}">
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
    @include('admin.pages.pos.invoice-detail')
@endsection
@section('customJs')
    <script>
        $('.invoiceDetail').on('click', function() {
            let cName = $(this).data('name');
            let cPhone = $(this).data('phone');
            let cAddr = $(this).data('addr');
            let passdue = $(this).data('passdue');
            let subtotal = $(this).data('subtotal');
            let totalpay = $(this).data('totalpay');
            let discount = $(this).data('discount');
            let receivemoney = $(this).data('receivemoney');
            let duemoney = $(this).data('duemoney');
            let cgpn = $(this).data('cgpn');
            let cgpq = $(this).data('cgpq');
            let cgpp = $(this).data('cgpp');
            let deudate = $(this).data('deudate');


            let invoiceid = $(this).data('invoiceid');

            postData = {
                'id': invoiceid,
                _token: $('meta[name="csrf-token"]').attr('content')
            }

            $.post('show-invoice', postData, function(res) {
                if (res['status'] === 'success') {
                    let dataList = res['mess'];
                    console.log(dataList);
                    //$('#details-modal').modal('show');
                    productlistByModal(cName, cPhone, cAddr, dataList, subtotal, totalpay, discount,
                        receivemoney, duemoney, passdue, deudate, cgpp);
                }
            });
        });

        // invoice show with modal
        function productlistByModal(cName, cPhone, cAddr, dataList, subtotal, totalpay, discount, receivemoney, duemoney, passdue, deudate, cgpp) {
            $('#CName').html(cName);
            $('#CPhone').html(cPhone);
            $('#CAdd').html(cAddr);
            $('#subtotal').html(subtotal);
            $('#discount').html(discount);
            $('#total').html(totalpay);
            $('#receiveMoney').html(receivemoney);
            $('#pastDue').html(passdue);
            $('#totalDue').html(passdue+duemoney);
            $('#duePaymenDate').html(deudate);
            $('#cgpp').html(cgpp);

            let invoiceList = $('#invoiceList');
            invoiceList.empty();

            let loopt = 1;
            dataList.forEach(item => {
                let row = `<tr class="text-xs">
                        <td>${loopt++}</td>
                        <td>${item['product']['productName']}</td>
                        <td>${item['productQty']}</td>
                        <td>${item['salePrice']}</td>
                        <td>${item['total']}</td>
                     </tr>`
                invoiceList.append(row)
            });
            $('#details-modal').modal('show');
        }

        // invoice print
        function PrintPage() {
            let printContents = document.getElementById('invoice').innerHTML;
            let originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            setTimeout(function() {
                location.reload();
            }, 1000);
        }
    </script>
@endsection
