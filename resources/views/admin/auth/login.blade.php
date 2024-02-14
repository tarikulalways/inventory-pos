@extends('admin.auth.master')
@section('authtitle', 'Login')
@section('authcontent')
    <div class="main-wrapper">
        <div class="account-content">
            <div class="login-wrapper">
                <div class="login-content">
                    <div class="login-userset">
                        <form action="{{ route('login.post') }}" method="POST">
                            <div class="login-logo">
                                <img src="{{ asset('admin/assets/img/logo.png') }}" alt="img">
                            </div>
                            <div class="login-userheading">
                                <h3>Sign In</h3>
                                <h4>Please login to your account</h4>
                            </div>
                            @if (session()->has('error'))
                                <p class="text-danger">{{ session('error') }}</p>
                            @endif
                            <div class="form-login">
                                <label>Email</label>
                                <div class="form-addons">
                                    <input name="email" type="email" placeholder="Enter your email address">
                                    <img src="{{ asset('admin/assets/img/icons/mail.svg') }}" alt="img">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-login">
                                <label>Password</label>
                                <div class="pass-group">
                                    <input name="password" type="password" class="pass-input"
                                        placeholder="Enter your password">
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-login">
                                <div class="alreadyuser">
                                    <h4><a href="{{ route('forget.view') }}" class="hover-a">Forgot Password?</a></h4>
                                </div>
                            </div>
                            <div class="form-login">
                                <button class="btn btn-login">Sign In</button>
                            </div>
                            <div class="form-setlogin">
                                <h4>sign up</h4>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="login-img">
                    <img src="{{ asset('admin/assets/img/login.jpg') }}" alt="img">
                </div>
            </div>
        </div>
    </div>
@endsection
