@extends('layouts.app')

@section('title')

Welcome
@endsection


@section('header')

<style>
    .banner{
   background:url("{{ checkIfImagesIsExit(getSetting('main_slider'),'/public/website/slider/','/website/slider/')}}")no-repeat center;
   min-height: 500px;
width: 100%;
-webkit-background-size: 100%;
-moz-background-size: 100%;
-o-background-size: 100%;
background-size: 100%;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;
padding-bottom: 100px;
           }
           
</style>

<link rel="stylesheet" href="{{ Request::root()  }}/main/css/reset.css"> <!-- Resource style -->
<link rel="stylesheet" href="{{ Request::root()  }}/main/css/style.css"> <!-- Resource style -->
<script src="{{ Request::root()  }}/main/js/modernizr.js"></script> <!-- Modernizr -->
@endsection


@section('content')
<div class="banner text-center" >
  <div class="container">
    <div class="banner-info">
        <h1 style="color: #000">
          Welcome in
          {{ getSetting() }}
      </h1>
        <p>
            {!! Form::open(['url' => 'search', 'method' => 'get'])  !!} 
        <div class="row">
            
            <div class="col-lg-3">
                {!! Form::text("bu_price_from",null,['class' => 'form-control','placeholder'=>'Building price From'])  !!}
            </div>
            <div class="col-lg-3">
                {!! Form::text("bu_price_to",null,['class' => 'form-control','placeholder'=>'Building price To'])  !!}
            </div>
           
            <div class="col-lg-3">
                {!! Form::select("rooms",roomnumber(),null,['class' => 'form-control select2','placeholder'=>'Rooms Number'])  !!}
            </div>
            <div class="col-lg-3">
               {!! Form::select("bu_type",bu_type(),null,['class' => 'form-control','placeholder'=>'Building Type'])  !!}
            </div>
            
            
        </div>
        
        <div class="row">
             <div class="col-lg-3">
                {!! Form::select("bu_place",bu_place(),null,['class' => 'form-control select2','placeholder'=>'Building place'])  !!}
            </div>
            <div class="col-lg-3">
               {!! Form::select("bu_rent",bu_rent(),null,['class' => 'form-control','placeholder'=>'Operation Kind'])  !!}

            </div>
            <div class="col-lg-3">
               {!! Form::text("bu_square",null,['class' => 'form-control','placeholder'=>'Area'])  !!}
            </div>
            <div class="col-lg-3">
               {!! Form::submit("Search",['class' => 'btn','style'=> 'width:100%'])  !!}
            </div>
        </div>
           {!! Form::close()  !!}
            
        </p>
      <a class="banner_btn" href="{{ url('/user/create/building') }}">Add New Building</a> </div>
  </div>
</div>
<div class="main">

    <ul class="cd-items cd-container">
	
        @foreach(\App\Bu::where('bu_status',1)->get() as $bu)

<!--        effect8-->
		<li class="cd-item effect8">

    <img src="{{  checkIfImagesIsExit($bu->image,'/public/website/thum/','/website/thum/')  }}" alt="{{ $bu->name }}" title="{{ $bu->name }}">

                <a href="#0" data-id="{{ $bu->id }}" class="cd-trigger" title="{{ $bu->name }}">Quick About</a>
		</li> <!-- cd-item -->
          @endforeach
	</ul> <!-- cd-items -->

	<div class="cd-quick-view">
		<div class="cd-slider-wrapper">
			<ul class="cd-slider">
      <li ><img src="" class="imagebox" alt="Product 1"></li>

			</ul> <!-- cd-slider -->

		</div> <!-- cd-slider-wrapper -->

		<div class="cd-item-info">
                    <h2 class="titlebox"></h2>
                        <p class="disbox"></p>

			<ul class="cd-item-action">
                            <li><a href="" class="add-to-cart pricebox"></a></li>
                                <li><a href="#0" class="morebox">Read more</a></li>
			</ul> <!-- cd-item-action -->
		</div> <!-- cd-item-info -->
		<a href="#0" class="cd-close">Close</a>
	</div> <!-- cd-quick-view -->
    
</div>
@endsection


@section('footer')

<script src="{{ Request::root()  }}/main/js/jquery-2.1.1.js"></script>
<script src="{{ Request::root()  }}/main/js/velocity.min.js"></script>
<script>
    function urlhome(){
        return '{{ Request::root()  }}';
    }
    
    function noImageurl(){
        return '{{ getSetting('no_image')  }}';
    }
</script>
<script src="{{ Request::root()  }}/main/js/main.js"></script> <!-- Resource jQuery -->
@endsection