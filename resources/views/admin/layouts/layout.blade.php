<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        AdminLTE 2 | Dashboard
        {{ getSetting() }}
    
        @yield('title')
    </title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    {!! Html::style('admin/bootstrap/css/bootstrap.min.css') !!}
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- jvectormap -->
    {!! Html::style('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css') !!}

    <!-- Theme style -->
    {!! Html::style('admin/dist/css/AdminLTE.min.css') !!}
    
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    {!! Html::style('admin/dist/css/skins/_all-skins.min.css') !!}
    
    <!-- iCheck -->
    {!! Html::style('admin/plugins/iCheck/flat/blue.css') !!}
    
    <!-- Morris chart -->
    {!! Html::style('admin/plugins/morris/morris.css') !!}
    
    <!-- jvectormap -->
    {!! Html::style('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css') !!}
    
    <!-- Date Picker -->
    {!! Html::style('admin/plugins/datepicker/datepicker3.css') !!}
    
    <!-- Daterange picker -->
    {!! Html::style('admin/plugins/daterangepicker/daterangepicker-bs3.css') !!}
    
    <!-- bootstrap wysihtml5 - text editor -->
    {!! Html::style('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') !!}
    
    {!! Html::style('cus/sweetalert.css') !!}
    
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    @yield('header')
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
      
      

    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="{{url('/adminpanel')}}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>LT</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Admin</b>LTE</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">
                      {{ countunreadmassage() }}
                    </span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">
                    You have
                    {{ countunreadmassage() }}
                    unread message
                  </li>

                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      @foreach(unreadmassage() as $keymassage => $valuemassage)
                      <li><!-- start message -->
                        <a href="{{ url('/adminpanel/contact/'.$valuemassage->id.'/edit') }}">

                          <h5>
                            {{ $valuemassage->contact_name }}
                            <small class="pull-right"><i ></i>{{ $valuemassage->created_at }}</small>
                          </h5>

                                  {{ str_limit($valuemassage->contact_message , 10)  }} </a>
                      </li>
                      <!-- end message -->
                        @endforeach

                    </ul>
                  </li>
                  <li class="footer"><a href="{{ url('/adminpanel/contact') }}">See All Messages</a></li>
                </ul>
              </li>
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">{{ countAllBuAppandtostatus(0) }}</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">
                    You have
                    {{ countAllBuAppandtostatus(0) }}  wait for activating</li>

                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">

                      @foreach(\App\Bu::where('bu_status',0)->get() as $buwaiting)
                      <li>

                        <a href="{{ url('/adminpanel/change_status/'.$buwaiting->id.'/1') }}" class="pull-right">
                          <span >
                            Active Building
                          </span>
                        </a>
                        <a href="{{ url('/adminpanel/bu/'.$buwaiting->id.'/edit') }}" class="pull-left">
                          <span >
                            {{ $buwaiting->bu_name }}
                          </span>

                        </a>
                        <div class="clearfix"></div>
                      </li>
                        @endforeach

                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
              <!-- Tasks: style can be found in dropdown.less -->

              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="/admin/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    <p>
                      {{ Auth::user()->name }}
                      <small>{{ Auth::user()->created_at }}</small>
                    </p>
                  </li>
                  <!-- Menu Body -->

                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href=" {{ url('/adminpanel/users/'.Auth::user()->id.'/edit') }}" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="{{ url('/logout') }}" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">

              <img src="/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>{{Auth::user()->name}}</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"> Last visited {{ Auth::user()->updated_at }}</li>
            @include('/admin/layouts/nav')
              </ul>
                

        </section>
        <!-- /.sidebar -->
      </aside>
      
      <div class="content-wrapper">
          
          @yield('content')
      </div>
       <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; {{ date('Y') }} <a href="https://www.facebook.com/profile.php?id=100005312403958">Amr Almagic</a>.</strong> All rights reserved.
      </footer>

       <!-- jQuery 2.1.4 -->
       {!! Html::script('admin/plugins/jQuery/jQuery-2.1.4.min.js') !!}
    
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    {!! Html::script('admin/bootstrap/js/bootstrap.min.js') !!}
   
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    
    {!! Html::script('admin/plugins/morris/morris.min.js') !!}
    
    <!-- Sparkline -->
    {!! Html::script('admin/plugins/sparkline/jquery.sparkline.min.js') !!}



    
    <!-- jvectormap -->
    {!! Html::script('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') !!}
    {!! Html::script('admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') !!}
    
    <!-- jQuery Knob Chart -->
    {!! Html::script('admin/plugins/knob/jquery.knob.js') !!}
    
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    {!! Html::script('admin/daterangepicker/daterangepicker.js') !!}
    
    <!-- datepicker -->
    {!! Html::script('admin/plugins/datepicker/bootstrap-datepicker.js') !!}
    
    <!-- Bootstrap WYSIHTML5 -->
    {!! Html::script('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') !!}
    
    <!-- Slimscroll -->
   
    {!! Html::script('admin/plugins/slimScroll/jquery.slimscroll.min.js') !!}

            <!-- ChartJS 1.0.1 -->

      {!! Html::script('admin/plugins/chartjs/Chart.min.js') !!}
    <!-- FastClick -->
  
    {!! Html::script('admin/plugins/fastclick/fastclick.min.js') !!}
    <!-- AdminLTE App -->
  
    {!! Html::script('admin/dist/js/app.min.js') !!}
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    
    {!! Html::script('admin/dist/js/pages/dashboard2.js') !!}
    <!-- AdminLTE for demo purposes -->
    
    {!! Html::script('admin/dist/js/demo.js') !!}
    {!! Html::script('cus/sweetalert.min.js') !!}
    </div><!-- /.content-wrapper -->
    @include('/admin/layouts/f_message')
    
    @yield('footer')
  </body>
</html>
