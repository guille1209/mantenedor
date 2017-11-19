<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">{{ trans('ui.cliente.descripcion') }}</label>
    <div class="col-lg-8">

        {!! Form::text('user_restricted', null, ['class' => 'form-control']) !!}

    </div>
</div>


<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">{{ trans('ui.cliente.grupo_cliente_id') }}</label>
    <div class="col-lg-8">
        {!! Form::select('enable',$estados, null, ['class' => 'form-control']) !!}
        
    </div>
</div>

<div class="form-group">
    <div class="col-lg-offset-2 col-lg-8">

        {!! Form::submit($button, ['class' => 'btn btn-primary']) !!}
        <a href="{{ url('cliente') }}">
            {!! Form::button($cancel, ['class' => 'btn btn-primary']) !!}
        </a>
    </div>
</div>