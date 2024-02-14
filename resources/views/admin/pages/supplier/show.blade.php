@extends('master')
@section('title', 'Supplier Details')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 m-auto py-5">
                <div class="card">
                    <div class="card-body">
                        <p>Supplier Name: <strong>{{ $supplier['supplierName'] }}</strong></p>
                        <p>Supplier Phone: <strong>{{ $supplier['supplierPhone'] }}</strong></p>
                        <p>Supplier Address: <strong>{{ $supplier['supplierAddress'] }}</strong></p>
                        <hr>
                        <h2>Total Receive Date</h2>
                        <hr>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Receive Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($detail as $details)
                                <tr>
                                    <td  scope="col">{{ $loop->index+1 }}</td>
                                    <td scope="col">{{ $details['payAbleDate'] }}</td>
                                </tr>
                              @endforeach
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
