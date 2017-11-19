@extends('layouts.masterIndex')

@section('style')
    <link href="{{ asset('js/jquery-multi-select/css/multi-select.css') }}" rel="stylesheet" />
@stop

@section('content')
    <section class="wrapper">
        @include('layouts.message')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ trans('ui.ip.edit_ip') }}</div>
                        <div class="panel-body">
                            @include('errors.form_error')

                            {!! Form::model($ip, ['method' => 'PUT', 'route' => ['ip.update', $ip->ip_restricted ], 'class' => 'cmxform form-horizontal', 'id' => 'nameForm']) !!}

                            @include('ip.form', array('ip' => $ip) + compact('ip', 'estados'), ['button' => trans('ui.ip.button_update'), 'cancel' => trans('ui.ip.button_cancel')])

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('js/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/validation/validation-init.js') }}"></script>
    <script src="{{ asset('js/jquery-multi-select/js/jquery.multi-select.js') }}"></script>
    <script src="{{ asset('js/multi-select-init.js') }}"></script>
@stop