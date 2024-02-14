@extends('master')
@section('title', 'Edit Category')
@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Edit Product Category</h4>
                <h6>Edit Category</h6>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <form action="{{ route('update.category', ['category'=>$category->id]) }}" method="POST">
                        @csrf
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Category Name</label>
                                <input name="categoryName" value="{{ $category->categoryName }}" type="text">
                                @error('categoryName')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Edit Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
