@extends('layouts.master')

@section('title', 'Login')

@section('content')
    <div class="loginBox section">
        <div class="container">
            <div class="text">
                <p>
                    {!! $post->post_content !!}
                </p>
            </div>
        </div>
    </div>

@endsection