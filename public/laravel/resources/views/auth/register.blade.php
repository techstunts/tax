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
            <div class="row">
                <form method="POST" action="{!! url('/auth/register') !!}">
                    {!! csrf_field() !!}
                    <div class="col-md-12 boxBg">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group has-error">
                                    <input class="form-control" placeholder="Name" type="text" name="name" value="{{ old('name') }}">
                                    @if($name_error = $errors->first('name'))
                                        <span class="errorMsg">{{$name_error}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <select class="form-control">
                                        <option>Sex</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                        <option>HUF</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" placeholder="Email" type="email" name="email" value="{{ old('email') }}">
                                    @if($email_error = $errors->first('email'))
                                        <span class="errorMsg">{{$email_error}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Pan Number">
                                    <p class="hlpTxt">(In case of HUF, please enter the PAN of the HUF)</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" type="password" name="password">
                                    @if($pwd_error = $errors->first('password'))
                                        <span class="errorMsg">{{$pwd_error}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Mobile Number">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" placeholder="Confirm Password" type="password" name="password_confirmation">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Address">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <p class="checkbox linHnml remmarginT addmarginB20"><input type="checkbox"> By creating an account , you agree to the following Terms and Conditions. (Here Terms and conditions should be Bold in character as it will open up a new link.)</p>
                        </div>
                        <div class="clear"></div>
                        <input type="submit" class="btn btn-primary btn-lg" value="Create Account">
                        <div class="bot">
                            Already have an account? Click <a href="{!! url('auth/login') !!}" class="txtred">here</a> to login.
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection