@extends('layouts.masterIndex')

@section('style')
    <link href="{{ asset('js/advanced-datatable/css/demo_page.css') }}" rel="stylesheet" />
    <link href="{{ asset('js/advanced-datatable/css/demo_table.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('js/data-tables/DT_bootstrap.css') }}" />
    @stop

@section('content')

    <!--body wrapper start-->
    <div class="wrapper">
        @include('layouts.message')
        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        {{ trans('ui.cliente.names') }}
            <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
                    </header>
                    <div class="panel-body">
                        <div class="adv-table">
                           
                            <a href="{{ url('cliente/create') }}"><button class="btn btn-primary" type="button"><i class="fa fa-plus-circle"></i> {{ trans("ui.cliente.button_add") }}</button></a>
                           
                            <a href="{{ url('cliente/show') }}" target="_blank"><button class="btn btn-primary"  type="button"><i class="fa fa-plus-circle"></i> {{ trans("ui.cliente.button_print") }}</button></a>
                           
                            <table  class="display table table-bordered table-striped" id="dynamic-table">
                                <thead>
                                <tr>
                                    <th>{{ trans('ui.cliente.descripcion') }}</th>
                                    <th>{{ trans('ui.cliente.grupo_cliente_id') }}</th>                          
                                   
                                    <th style="width: 60px">{{ trans('ui.cliente.button_update') }}</th>
                                   
                                    <th style="width: 60px">{{ trans('ui.cliente.button_delete') }}</th>
                                  
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($clientes as $cliente)
                                    <tr class="gradeX">
                                        <td>{{ $cliente->user_restricted }}</td>
                                        <td>@if ($cliente->enable==1) 
                                             Habilitado
                                             @else
                                               Deshabilitado
                                            @endif 
                                        </td>
                                        
                                        <td align="center">
                                            <a href="{{ url('cliente/' . $cliente->user_restricted . '/edit') }}">
                                                <button class="btn btn-info " title="{{ trans('ui.cliente.button_update') }}" type="button"><i class="fa fa-refresh"></i> </button>
                                            </a>
                                        </td>
                                       
                                       
                                        <td align="center">
                                            {!! Form::open(['url' => 'cliente/'. $cliente->user_restricted, 'method' => 'delete', 'id'=>'delete']) !!}
                                            <button class="btn btn-danger " title="{{ trans('ui.cliente.button_delete') }}" type="submit"><i class="fa fa-times-circle"></i></button>
                                            {!! Form::close() !!}
                                        </td>
                                        
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>{{ trans('ui.cliente.descripcion') }}</th>
                                    <th>{{ trans('ui.cliente.grupo_cliente_id') }}</th>
                                  
                                    <th>{{ trans('ui.cliente.button_update') }}</th>
                                  
                                 
                                    <th>{{ trans('ui.cliente.button_delete') }}</th>
                                  
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@stop

@section('script')
            <!--dynamic table-->
    <script type="text/javascript" language="javascript" src="{{ asset('js/advanced-datatable/js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/data-tables/DT_bootstrap.js') }}"></script>
    <!--dynamic table initialization -->
    <script src="{{ asset('js/dynamic_table_init.js') }}"></script>
@stop