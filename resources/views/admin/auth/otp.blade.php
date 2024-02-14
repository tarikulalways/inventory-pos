@extends('admin.auth.master')
@section('authtitle', 'Check Otp')
@section('authcontent')
    <div class="main-wrapper">
        <div class="account-content">
            <div class="login-wrapper">
                <div class="login-content">
                    <div class="login-userset ">
                        <div class="login-logo">
                            <img src="{{ asset('admin') }}/assets/img/logo.png" alt="img">
                        </div>
                        <div class="login-userheading">
                            <h3>Check OTP</h3>
                            @if (session()->has('otpsend'))
                                <p class="text-success">{{ session('otpsend') }}</p>
                            @endif
                            @if (session()->has('errorotp'))
                                <p class="text-danger">{{ session('errorotp') }}</p>
                            @endif
                        </div>
                        <form action="{{ route('veryfyPost.otp') }}" method="POST">
                            <div class="form-login">
                                <label>OTP</label>
                                <div class="form-addons">
                                    <input name="otp" type="text" placeholder="send your otp that send your email">
                                </div>
                            </div>
                            <div class="form-login">
                                <button class="btn btn-login">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="login-img">
                    <img src="{{ asset('admin') }}/assets/img/login.jpg" alt="img">
                </div>
            </div>
        </div>
    </div>
@endsection
