@extends('layouts.master')

@section('style')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/style-responsive.css') }}" rel="stylesheet" />
@stop

@section('content')

    <div class="container">

        {!! Form::open(array('route' => 'auth/login', 'class' => 'cmxform form-signin', 'id' => 'loginForm')) !!}

            <div class="form-signin-heading text-center">
                <h1 class="sign-title">{{ trans('ui.login.signin') }}</h1>
                <img src={{ asset('images/login-logo.png') }}  alt=""/>
            </div>
            <div class="login-wrap">
                <input type="text" class="form-control" name="email" placeholder={{ trans('ui.login.username') }} value="admin" autofocus>

                <input type="password" class="form-control" name="password" placeholder={{ trans('ui.login.password') }} value="123456">

                {!! Form::select('servidor',array_combine(explode(",", env('IP_SERVIDORES')),explode(",", env('SERVIDORES'))),  null, ['class' => 'form-control', 'placeholder' =>"Servidor"]) !!}

                <button class="btn btn-lg btn-login btn-block" type="submit">
                    Aceptar
                </button>

             

                @include('errors.form_error')
            </div>
            {!! Form::close() !!}

    </div>

@stop  