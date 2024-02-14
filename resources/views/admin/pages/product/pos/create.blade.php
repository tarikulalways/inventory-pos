@extends('master')
@section('title', 'POS')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-5">
                {{-- customer --}}
                @include('admin.pages.pos.inc.customerList')
                {{-- customer end --}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                {{-- invice tabel --}}
                @include('admin.pages.pos.inc.invoiceTable')
                {{-- invice tabel end --}}

            </div>
            {{-- product list --}}
            @include('admin.pages.pos.inc.productList')
            {{-- product list end --}}
        </div>
    </div>
@endsection
@section('customJs')
    <script>
        var allProductList = [];
        // get all product
        $('.getProduct').on('click', function() {
            let pId = $(this).data('id');
            let pName = $(this).data('name');
            let pPrice = $(this).data('price');
            let maxQty = $(this).data('maxqty');
            ProductModal(pId, pName, pPrice, maxQty);
        });

        // show modal product details
        function ProductModal(pId, pName, pPrice, maxQty) {
            $('#maxQty').val(maxQty);
            $('#pId').val(pId);
            $('#pName').val(pName);
            $('#pPrice').val(pPrice);
            $('#ProductModal').modal('show');
        }

        // select product data
        function addProduct() {
            let pId = $('#pId').val();
            let pName = $('#pName').val();
            let pPrice = $('#pPrice').val();
            let Qty = $('#Qty').val();

            let totalPrice = Qty * pPrice

            item = {
                ProductId: pId,
                ProductName: pName,
                ProductPrice: pPrice,
                ProductQty: Qty,
                total: totalPrice
            }
            allProductList.push(item);
            $('#ProductModal').modal('hide');
            showProduct();

        }

        // show invoice tabel product
        function showProduct() {
            let productList = $('#productList');
            productList.empty();

            allProductList.forEach(function(item, index) {
                let row = `<tr class="text-xs">
                        <td>${item['ProductName']}</td>
                        <td>${item['ProductQty']}</td>
                        <td>${item['ProductPrice']}</td>
                        <td>${item['total']}</td>
                        <td><a data-index="${index}" class="btn remove text-xxs px-2 py-1  btn-sm m-0">
                            <img src="assets/img/icons/delete.svg" alt="img">
                            </a></td>
                     </tr>`
                productList.append(row);
            });

            calculateGrandtotal();

            $('.remove').on('click', function() {
                let index = $(this).data('index');
                removeItem(index);
            });
        }

        //remove invoice list item
        function removeItem(index) {
            allProductList.splice(index, 1);
            showProduct();
        }

        // discount calculator
        function discountCal() {
            calculateGrandtotal();
        }

        // receive money
        function recevieMony() {
            calculateGrandtotal();
        }

        // customer form get product
        function cgetProduct() {
            var cgetPN = $('#cgetPN').val();
            var cgetPQ = $('#cgetPQ').val();
            var cgetPP = $('#cgetPP').val();

            calculateGrandtotal();
        }

        function calculateGrandtotal() {
            let Total = 0;
            let Discount = 0;
            let DueMony = 0;

            allProductList.forEach(item => {
                Total = Total + item['total'];
            });

            $('#subTotal').html(Total);

            //get customer forme product calcualtion

            let cgetPP = $('#cgetPP').val();
            if (cgetPP) {
                Total = (Total - cgetPP);
                $('#TotalPay').html(Total);
            } else {
                $('#TotalPay').html(Total);
            }

            //discount calculation
            let disNumber = $('#disCount').val();
            if (disNumber) {
                Discount = (Total - disNumber);
                $('#TotalPay').html(Discount);
            } else {
                $('#TotalPay').html(Total);
            }

            //recevice mony claculation
            let reciveMony = $('#recevieMony').val();
            if (reciveMony) {
                if (disNumber) {
                    DueMony = (Discount - reciveMony);
                    $('#dueMony').val(DueMony);
                } else {
                    DueMony = (Total - reciveMony);
                    $('#dueMony').val(DueMony);
                }
            } else {
                $('#dueMony').val(reciveMony);
            }
        }

        // customer modal show
        function addCustomer() {
            $('#customerModal').modal('show');
        }

        // get customer
        function getCutomer() {
            selectedOption = $('.selectCustomer').find('option:selected');

            let cId = selectedOption.data('id');
            let cName = selectedOption.data('name');
            let cPhone = selectedOption.data('phone');
            let cAdd = selectedOption.data('addr');

            $('#CName').html(cName);
            $('#CPhone').html(cPhone);
            $('#CAdd').html(cAdd);
            $('#cId').html(cId);
        }


        // add new customer
        function addNewCustomer() {
            let name = $('#customerName').val();
            let phone = $('#customerPhone').val();
            let address = $('#customerAddr').val();

            if (name.length === 0) {
                $('.name').html('Name is required');
            } else if (phone.length === 0) {
                $('.phone').html('Phone is required');
            } else if (address.length === 0) {
                $('.addr').html('Address is required');
            } else {
                postBody = {
                    'customerName': name,
                    'customerPhone': phone,
                    'customerAddress': address,
                    _token: $('meta[name="csrf-token"]').attr('content')
                }

                $.post('store-customer', postBody, function(res) {
                    if (res['status'] === 'success') {
                        $('#customerModal').modal('hide');
                        $('#customerAddS').html(res['mess']);
                        $('#customerAddModal').modal('show');
                        setTimeout((hideModal) => {
                            hideModal = $('#customerAddModal').modal('hide');
                        }, 2000);
                        window.location.reload();
                    }
                });
            }
        }

        // create invoice
        function createInvoice() {

            let CId = $('#cId').text();
            let subTotal = $('#subTotal').text();
            let TotalPay = $('#TotalPay').text();
            let disCount = $('#disCount').val();
            let recevieMony = $('#recevieMony').val();
            let dueMony = $('#dueMony').val();
            let duePaymenDate = $('#duePaymenDate').val();
            let cgetPN = $('#cgetPN').val();
            let cgetPQ = $('#cgetPQ').val();
            let cgetPP = $('#cgetPP').val();

            if (recevieMony.length === 0) {
                $('#notgetMoney').html('Money is required');
            }

            if (CId.length && allProductList.length) {

                if (dueMony >= 1 && duePaymenDate.length === 0) {
                    $('#dueDate').html('Due date is required');
                } else {
                    postData = {
                        'customerId': CId,
                        'totalPayAble': TotalPay,
                        'discount': disCount,
                        'receiveMoney': recevieMony,
                        'dueMoney': dueMony,
                        'duePaymentDate': duePaymenDate,
                        'subTotal': subTotal,
                        'customerGPN': cgetPN,
                        'customerGPQty': cgetPQ,
                        'customerGPP': cgetPP,
                        'products': allProductList,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    }

                    // invoice create
                    $.post('store-invoice', postData, function(res) {
                        console.log(res);
                        if (res['status'] === 'success') {
                            $('#customerAddS').html(res['mess']);
                            $('#customerAddModal').modal('show');

                            setTimeout((hideModal) => {
                                hideModal = $('#customerAddModal').modal('hide');
                            }, 3000);
                            window.location.reload();
                        }
                    });
                }

            } else {
                $('#error').html('Select Product and customer');
            }
        }
    </script>
@endsection
