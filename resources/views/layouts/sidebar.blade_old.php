<!-- left side start-->
<div class="left-side sticky-left-side">

    <!--logo and iconic logo start-->
    <div class="logo">
        <a><img src="{{ asset('images/logo.png')  }}" alt=""></a>
    </div>

    <div class="left-side-inner">

        <!--sidebar nav start-->
        <ul class="nav nav-pills nav-stacked custom-nav">
        
            <li class="active"><a href="{{ url('/') }}"><i class="fa fa-cutlery"></i> <span>{{ trans('ui.sidebar.dashboard') }}</span></a></li>
  
<li class="menu-list"><a href=""><i class="fa  fa-th-large"></i> <span>{{ trans('ui.sidebar.label_datos') }}</span></a>
         
            <li class="menu-list"><a href=""><i class="fa  fa-th-large"></i> <span>{{ trans('ui.sidebar.label_datos') }}</span></a>
            

        </ul>
        <!--sidebar nav end-->

    </div>
</div>