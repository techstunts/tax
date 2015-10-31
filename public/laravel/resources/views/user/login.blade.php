@extends('layouts.master')

@section('title', 'Login')

@section('content')
    <div class="loginBox section">
        <div class="container">
            <div class="row">
                <div class="clearfix">
                    <div class="col-md-6 col-sm-6 alignC">
                        <h1>Login to Your Account</h1>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 boxBg">
                    <div class="form-group has-error">
                        <input type="text" class="form-control" placeholder="Username">
                        <span class="errorMsg">Error message will come here.</span>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password">
                    </div>
                    <input type="button" class="btn btn-primary btn-lg" value="Login">
                    <a href="#" class="forgotPsw">Forgot your password?</a>
                    <div class="bot">
                        Don’t have an account yet? Click <a href="#" class="txtred">here</a> for new account.
                    </div>
                </div>
                <div class="col-md-5 col-md-offset-1 col-sm-6 right">
                    <div class="or"><span>or</span></div>
                    <h4 class="font-opensansbd">Sign in using:</h4>
                    <div class="btns">
                        <a href="#" class="fb"><span><i class="fa fa-facebook-f"></i></span> Facebook</a>
                        <a href="#" class="twitter"><span><i class="fa fa-twitter"></i></span> Twitter</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection