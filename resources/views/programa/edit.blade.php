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
                        <div class="panel-heading">{{ trans('ui.programa.edit_programa') }}</div>
                        <div class="panel-body">
                            @include('errors.form_error')

                            {!! Form::model($programa, ['method' => 'PUT', 'route' => ['programa.update', $programa->programs_restricted], 'class' => 'cmxform form-horizontal', 'id' => 'nameForm']) !!}

                            @include('programa.form', array('programa' => $programa) + compact('programa', 'estados'), ['button' => trans('ui.programa.button_update'), 'cancel' => trans('ui.ip.button_cancel')])

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