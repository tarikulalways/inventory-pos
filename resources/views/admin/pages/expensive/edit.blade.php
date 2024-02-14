@extends('master')
@section('title', 'Edit Expensive')
@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Edit Expensive</h4>
                <h6>Edit New Expensive</h6>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <form action="{{ route('update.expensive', ['expensive'=>$expensive->id]) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Expense for</label>
                                    <input name="expensfor" value="{{ $expensive['expensfor'] }}" type="text">
                                    @error('expensfor')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Amount</label>
                                    <input name="expamount" value="{{ $expensive['expamount'] }}" type="text">
                                    @error('expamount')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-submit me-2">Add Expensive</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
