<!-- left side start-->
<div class="left-side sticky-left-side">

    <!--logo and iconic logo start-->
    <div class="logo">
        <a><img src="{{ asset('images/logo.png')  }}" alt=""></a>
    </div>

    <div class="left-side-inner">

        <!--sidebar nav start-->
        <ul class="nav nav-pills nav-stacked custom-nav">
  
            <li class="active"><a href="{{ url('/') }}"><i class="fa fa-cube"></i> <span>{{ trans('ui.sidebar.dashboard') }}</span></a></li>

           
                <li><a href="{{ url('cliente') }}"><i class="fa fa-users"></i> <span>{{ trans('ui.sidebar.users') }}</span></a></li>

                 <li><a href="{{ url('programa') }}"><i class="fa fa-pencil-square-o"></i> <span>{{ trans('ui.sidebar.programs') }}</span></a></li>
          
            <li><a href="{{ url('ip') }}"><i class="fa fa-mobile"></i> <span>{{ trans('ui.sidebar.ip') }}</span></a></li>
         

        </ul>
        <!--sidebar nav end-->

    </div>
</div>