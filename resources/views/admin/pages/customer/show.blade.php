@extends('master')
@section('title', 'Customer Details')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 m-auto py-5">
                <div class="card">
                    <div class="card-body">
                        <p>Customer Name: <strong>{{ $customer['customerName'] }}</strong></p>
                        <p>Customer Phone: <strong>{{ $customer['customerPhone'] }}</strong></p>
                        <p>Customer Address: <strong>{{ $customer['customerAddress'] }}</strong></p>
                        <hr>
                        <h2>The customer took these dates</h2>
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
                                        <td scope="col">{{ $loop->index + 1 }}</td>
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
