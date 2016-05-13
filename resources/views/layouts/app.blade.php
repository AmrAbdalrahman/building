<!DOCTYPE html>
<html lang="en">
<head>
    
    
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    {!! Html::style('website/css/bootstrap.min.css') !!}
    {!! Html::style('website/css/flexslider.css') !!}
    {!! Html::style('website/css/style.css') !!}
    {!! Html::style('website/css/font-awesome.min.css') !!}
    {!! Html::script('website/js/jquery.min.js') !!}
    {!! Html::script('website/js/bootstrap.min.js') !!}
    {!! Html::script('website/js/jquery.flexslider.js') !!}
    {!! Html::script('website/js/responsive-nav.js') !!}
    
    
    
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet' type='text/css'>

    <title>
    
        {{ getSetting() }}
        
        |
        @yield('title')
    
    
    </title>
    
    @yield('header')
    
    {!! Html::style('cus/css/select2.css')  !!}
    


</head>
<body id="app-layout">
    
    
    <div class="header">

  <div class="container">


      <div class="bs-example " >
          <nav id="myNavbar" class="navbar " role="navigation">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                      <a class="toggleMenu" href="#"><img src="{{Request::root()}}/website/images/nav_icon.png" alt="" /> </a>
                  </button>
                  <a class="navbar-brand co" href={{url('/')}}><i class="fa fa-paper-plane"></i> ONE</a>


              </div>

              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse navbar-right " id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav">
                      <li class="{{ setActive(['home'],'current') }}"><a class="co" href={{url('/')}}>Home</a></li>
                <!--      <li class="{{ setActive(['home'],'current') }}"><a class="co" href="{{url('/home')}}">Home</a></li> -->
                      <li role="separator" class="divider"></li>

                      <li class="{{ setActive(['ShowAllBuilding'],'current') }}"><a class="cf"  href="{{url('/ShowAllBuilding')}}">All Building</a></li>

                      <li class="dropdown dropdown {{ setActive(['search'],'current') }}">
                          <a class="cf" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                              Rent <span class="caret"></span>
                          </a>

                          <ul class="dropdown-menu">
                              @foreach(bu_type() as $keytype=> $type)
                                  <li style="width: 100%;"><a  href="{{ url('/search?bu_rent=1&bu_type='.$keytype) }}">{{ $type }}</a></li>
                              @endforeach
                          </ul>
                      </li>



                      <li class="dropdown">
                          <a class="cf"  href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                              Ownership <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu">
                              @foreach(bu_type() as $keytype=> $type)
                                  <li style="width: 100%;"><a href="{{ url('/search?bu_rent=0&bu_type='.$keytype) }}">{{ $type }}</a></li>
                              @endforeach
                          </ul>
                      </li>

                      <li><a class="cf" href="{{ url('/contact') }}">Contact Us</a></li>

                      @if (Auth::guest())
                          <li><a class="cf" href="{{ url('/login') }}">Login</a></li>
                          <li><a class="cf" href="{{ url('/register') }}">Register</a></li>
                      @else

                          <li class="dropdown">
                              <a class="cf" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                  {{ Auth::user()->name }} <span class="caret"></span>
                              </a>
                              <ul class="dropdown-menu">

                                  <li class="{{ setActive(['user','editsetting']) }}">

                                      <a href="{{ url('/user/editsetting') }}">
                                          <i class="fa fa-edit"></i>
                                          Editing Personal Information </a>
                                  </li>
                                  <li class="{{ setActive(['user','buildingshow']) }}">
                                      <a href="{{ url('/user/buildingshow') }}">
                                          <i class="fa fa-check"></i>
                                          Buildings Activation </a>
                                  </li>

                                  <li class="{{ setActive(['user','buildingshowwaiting']) }}">
                                      <a href="{{ url('/user/buildingshowwaiting') }}">
                                          <i class="fa fa-clock-o"></i>
                                          Buildings wait for Activate </a>
                                  </li>

                                  <li class="{{ setActive(['user','create','building']) }}">
                                      <a href="{{ url('/user/create/building') }}">
                                          <i class="fa fa-plus"></i>
                                          Add Building </a>
                                  </li>

                                  <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>

                              </ul>
                          </li>
                      @endif


                  </ul>

              </div><!-- /.navbar-collapse -->

          </nav>
      </div>
  </div>
</div>
    
    
    @include('layouts.message')

    @yield('content')
    
    
    <div class="footer">
  <div class="footer_bottom">
    <div class="follow-us">
        <a class="fa fa-facebook social-icon" href="{{ getSetting('facebook') }}"></a> 
        <a class="fa fa-twitter social-icon" href="{{ getSetting('twitter') }}"></a>
        <a class="fa fa-youtube social-icon" href="{{ getSetting('youtube') }}"></a> 
    </div>
    <div class="copy">
      <p> {{ getSetting('footer') }} &copy; {{ date('Y') }} <a href="https://www.facebook.com/profile.php?id=100005312403958" rel="nofollow">Amr Abd Alrahman</a></p>
    </div>
  </div>
</div>

    {!! Html::script('cus/js/select2.js')  !!}
<script type="text/javascript">
  $('.select2').select2();
</script>
    

   @yield('footer')
</body>
</html>
