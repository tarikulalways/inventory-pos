@extends('admin.auth.master')
@section('authtitle', 'Change Password')
@section('authcontent')
    <div class="main-wrapper">
        <div class="account-content">
            <div class="login-wrapper">
                <div class="login-content">
                    <div class="login-userset">
                        <div class="login-logo">
                            <img src="{{ asset('admin/assets/img/logo.png') }}" alt="img">
                        </div>
                        <div class="login-userheading">
                            <h3>Change Password</h3>
                        </div>
                        @if (session()->has('wrongPwd'))
                            <p class="text-danger">{{ session('wrongPwd') }}</p>
                        @endif
                        <form action="{{ route('change.password') }}" method="POST">
                            <div class="form-login">
                                <div class="pass-group">
                                    @isset($userEmail)
                                        <input readonly type="text" class="form-control" value="{{ $userEmail }}">
                                    @endisset
                                </div>
                            </div>
                            <div class="form-login">
                                <label>New Password</label>
                                <div class="pass-group">
                                    @isset($getOtp)
                                        <input type="hidden" name="veryfyOtp" value="{{ $getOtp }}">
                                    @endisset
                                    <input name="newPwd" type="password" class="pass-input" placeholder="Enter your password">
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                </div>
                            </div>
                            <div class="form-login">
                                <label>Confirm Password</label>
                                <div class="pass-group">
                                    <input name="confimrPwd" type="password" class="pass-input" placeholder="Enter your confirm password">
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                </div>
                            </div>
                            <div class="form-login">
                                <button class="btn btn-login">Submit</button>
                            </div>
                        </form>
                        <div class="form-setlogin">
                            <h4>sign up</h4>
                        </div>
                    </div>
                </div>
                <div class="login-img">
                    <img src="{{ asset('admin/assets/img/login.jpg') }}" alt="img">
                </div>
            </div>
        </div>
    </div>
@endsection
