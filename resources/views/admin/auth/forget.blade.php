@extends('admin.auth.master')
@section('authtitle', 'Forget')
@section('authcontent')
    <div class="main-wrapper">
        <div class="account-content">
            <div class="login-wrapper">
                <div class="login-content">
                    <div class="login-userset ">
                        <form action="{{ route('forget.post') }}" method="POST">
                            <div class="login-logo">
                                <img src="{{ asset('admin') }}/assets/img/logo.png" alt="img">
                            </div>
                            <div class="login-userheading">
                                <h3>Forgot password?</h3>
                                <h4>Don’t warry! it happens. Please enter the address <br>
                                    associated with your account.</h4>
                            </div>
                            <div class="form-login">
                                <label>Email</label>
                                <div class="form-addons">
                                    <input name="email" type="email" placeholder="Enter your email address">
                                    <img src="{{ asset('admin') }}/assets/img/icons/mail.svg" alt="img">
                                </div>
                                @if (session()->has('erroremail'))
                                    <p class="text-danger">{{ session('erroremail') }}</p>
                                @endif
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
