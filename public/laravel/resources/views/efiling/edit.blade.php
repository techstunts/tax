@extends('layouts.master')

@section('title', 'Efiling : ' . $step_name)

@section('content')
<div id="contentCntr">
    <div class="loginBox section wizard">
        <div class="container">
            <div class="row">
                <div class="clearfix">
                    <div class="col-md-12 alignC">
                        <h1>E-file tax return : {!! strtoupper(substr($tax_payer_type,0,1)) . substr($tax_payer_type,1) !!}</h1>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-md-offset-3 steps">
                    @foreach($steps_ordered as $steporder)
                        <a class="{!! $step == $steporder ? "selected" : "" !!}" href="{!! url("efiling/$tax_payer_type/$steporder") !!}">{!! $steps[$steporder]['name'] !!}</a>
                    @endforeach
                </div>
                <form action="{!! url("efiling/$tax_payer_type/$step") !!}" method="post">
                    @foreach($groups as $group_name => $group_details)
                    <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 boxBg">
                        @foreach($group_details as $field_name => $field_details)
                            <div class="form-group">
                                <input type="text"
                                       class="form-control"
                                       name="{!! $group_name . '[' . $field_name . ']' !!}"
                                       placeholder="{!! $field_details['display_name'] !!}"
                                       value="{!! isset($efile_data[$group_name][$field_name]) && !is_array($efile_data[$group_name][$field_name])
                                       ? $efile_data[$group_name][$field_name] : ""  !!}">
                            </div>
                        @endforeach
                    </div>
                    @endforeach
                    <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 boxBg">
                        @if(isset($steps[$previous_step]))
                            <input type="submit" class="btn btn-primary btn-lg left" name="submit" value="Back">
                        @endif
                        @if(isset($steps[$next_step]))
                            <input type="submit" class="btn btn-primary btn-lg " name="submit" value="Next">
                        @endif
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection