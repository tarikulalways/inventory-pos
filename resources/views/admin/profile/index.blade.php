@extends('master')
@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Management Profile</h4>
                <h6>Update Profile</h6>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('profile.update') }}" method="POST">
                    <div class="row">
                        @if (session()->has('wrong'))
                            <p class="text-danger">{{ session('wrong') }}</p>
                        @endif
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" name="newEemail" readonly value="{{ Auth::user()->email }}" type="text">
                                </div>
                            </div>
                        </div>
                       <div class="row">
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Password</label>
                                <div class="pass-group">
                                    <input name="newpass" type="password" class=" pass-input">
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <div class="pass-group">
                                    <input name="confirmpass" type="password" class=" pass-inputs">
                                    <span class="fas toggle-passworda fa-eye-slash"></span>
                                </div>
                            </div>
                        </div>
                       </div>
                        <div class="col-lg-12">
                            <button class="btn btn-submit me-2">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
