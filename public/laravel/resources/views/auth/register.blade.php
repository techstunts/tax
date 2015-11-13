@extends('layouts.master')

@section('title', 'Signup')

@section('content')
<div id="contentCntr">
    <div class="loginBox section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 alignC">
                    <h1>Create a New Account</h1>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 boxBg">
                <form method="POST" action="{!! url('/auth/register') !!}">
                    {!! csrf_field() !!}
                        <div class="form-group has-error">
                            <input class="form-control" placeholder="Name" type="text" name="name" value="{{ old('name') }}">
                            @if($name_error = $errors->first('name'))
                                <span class="errorMsg">{{$name_error}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Email" type="email" name="email" value="{{ old('email') }}">
                            @if($email_error = $errors->first('email'))
                                <span class="errorMsg">{{$email_error}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Pan Number">
                            <p class="hlpTxt">(In case of HUF, please enter the PAN of the HUF)</p>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Password" type="password" name="password">
                            @if($pwd_error = $errors->first('password'))
                                <span class="errorMsg">{{$pwd_error}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Confirm Password" type="password" name="password_confirmation">
                        </div>
                        <div class="form-group">
                            <input type="checkbox"> By creating an account , you agree to the following Terms and Conditions.
                        </div>
                        <input type="submit" class="btn btn-primary btn-lg" value="Create Account">
                        <div class="bot">
                            Already have an account? Click <a href="{!! url('auth/login') !!}" class="txtred">here</a> to login.
                        </div>
                </form>
            </div>
            <div class="col-md-5 col-md-offset-1 col-sm-6 right">
                <div class="or"><span>or</span></div>
                <h4 class="font-opensansbd">Sign up using:</h4>
                <div class="btns">
                    <a href="{!! url('auth/social/facebook') !!}" class="fb"><span><i class="fa fa-facebook-f"></i></span> Facebook</a>
                    <a href="{!! url('auth/social/google') !!}" class="google"><span><i class="fa fa-google"></i></span> Google</a>
                    <a href="{!! url('auth/social/linkedin') !!}" class="linkedin"><span><i class="fa fa-linkedin"></i></span> Linkedin</a>
                    <a href="{!! url('auth/social/twitter') !!}" class="twitter"><span><i class="fa fa-twitter"></i></span> Twitter</a>
                    <a href="{!! url('auth/social/github') !!}" class="github"><span><i class="fa fa-github"></i></span> Github</a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection