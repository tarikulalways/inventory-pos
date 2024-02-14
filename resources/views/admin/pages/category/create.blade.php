@extends('master')
@section('title', 'Add Category')
@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Add Category</h4>
                <h6>Create newCategory</h6>
            </div>
        </div>
        @if (session()->has('store'))
            <div class="alert alert-success">{{ session('store') }}</div>
        @endif
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <form action="{{ route('store.category') }}" method="POST">
                        @csrf
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Category Name</label>
                                <input name="categoryName" type="text">
                                @error('categoryName')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Add Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
