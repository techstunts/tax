@extends('layouts.master')

@section('title', $post->post_title)

@section('content')
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="clearfix">
                    <div class="col-md-12 alignC">
                        <h1>{!! $post->post_title !!}</h1>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 ">
                            {!! $post->post_content !!}
                </div>
                <div class="col-md-5 col-md-offset-1 col-sm-6 right">
                    <div class="post-actions">
                        <a href="{!! url('efiling/individual/personal') !!}"><em class="sprite"></em>Start Filing Now</a>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection
