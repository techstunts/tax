@extends('layouts.master')

@section('title', 'Forgot password')

@section('content')
    <div class="loginBox section">
        <div class="container">
            <div class="row">
                <div class="clearfix">
                    <div class="col-md-12 alignC">
                        <h1>Forgot Your Password</h1>
                    </div>
                </div>
                <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 boxBg">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter your registered email id">
                    </div>
                    <input type="button" class="btn btn-primary btn-lg" value="Create New Password">
                </div>
            </div>
        </div>
    </div>

@endsection