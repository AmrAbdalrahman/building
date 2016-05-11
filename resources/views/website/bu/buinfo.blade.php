@extends('layouts.app')


@section('title')

 Buildings {{$buInfo->bu_name  }}

@endsection

@section('header')

<script
src="http://maps.googleapis.com/maps/api/js">
</script>

{!!  Html::style('cus/buall.css')  !!}
<style>
    hr{
        margin-top: 10px;
        margin-bottom: 10px;
    }
    .scl{

        margin-bottom: 10px;
    }
    .breadcrumb{
        background-color: #fff;
    }
    
    
</style>

@endsection
@section('content')

<div class="container">
    
    <div class="container">
    <div class="row profile">
	
        @include('website.bu.pages')
    
        <div class="col-md-9">

            <br>
            <ol class="breadcrumb">
  <li><a href="{{ url('/') }}">Home</a></li>
  <li><a href="{{ url('/ShowAllBuilding') }}">All Building</a></li>
   <li><a href="{{ url('/SingleBuilding/'.$buInfo->id) }}">{{$buInfo->bu_name  }}</a></li>
</ol>
            
            <div class="profile-content">
                
                <h1>
                   {{$buInfo->bu_name  }} 
                </h1>
                <hr>
                <div class="btn-group" role="group">

                <a href="{{ url( '/search?bu_price'.$buInfo->bu_price) }}" class="btn btn-default scl">
                    Price
                    :
                    {{$buInfo->bu_price  }} 
                </a>
                <a href="{{ url( '/search?bu_square'.$buInfo->bu_square) }}" class="btn btn-default scl">
                    Square
                    :
                    {{$buInfo->bu_square  }} 
                </a>
                
                <a href="{{ url( '/search?bu_place'.$buInfo->bu_place) }}" class="btn btn-default scl">
                    place
                    :
                    {{ bu_place() [$buInfo->bu_place]  }} 
                </a>
                
                <a href="{{ url( '/search?rooms'.$buInfo->rooms) }}" class="btn btn-default scl">
                    Rooms Number
                    :
                    {{$buInfo->rooms  }} 
                </a>
                
                <a href="{{ url( '/search?bu_rent'.$buInfo->bu_rent) }}" class="btn btn-default scl">
                    Operation Kind
                    :
                    {{ bu_rent() [$buInfo->bu_rent]  }} 
                </a>
                    
                
                <a href="{{ url( '/search?bu_type'.$buInfo->bu_type) }}" class="btn btn-default scl">
                    Building Type
                    :
                    {{ bu_type()[$buInfo->bu_type]  }} 
                </a>
                    

                    
  </div>
                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-572abda0b77da980"></script>
                <br>
                <a href="https://api.addthis.com/oexchange/0.8/forward/facebook/offer?url={{ url('/SingleBuilding/'.$buInfo->id) }}&pubid=ra-572abda0b77da980&ct=1&title={{$buInfo->bu_name  }}{{ getSetting() }}&pco=tbxnj-1.0" target="_blank"><img src="https://cache.addthiscdn.com/icons/v3/thumbs/32x32/facebook.png" border="0" alt="Facebook" style="margin-top: 15px;"/></a>
                <a href="https://api.addthis.com/oexchange/0.8/forward/twitter/offer?url={{ url('/SingleBuilding/'.$buInfo->id) }}&pubid=ra-572abda0b77da980&ct=1&title={{$buInfo->bu_name  }}{{ getSetting() }}&pco=tbxnj-1.0" target="_blank"><img src="https://cache.addthiscdn.com/icons/v3/thumbs/32x32/twitter.png" border="0" alt="Twitter" style="margin-top: 15px;"/></a>
                <a href="https://api.addthis.com/oexchange/0.8/forward/google_plusone_share/offer?url={{ url('/SingleBuilding/'.$buInfo->id) }}&pubid=ra-572abda0b77da980&ct=1&title={{$buInfo->bu_name  }}{{ getSetting() }}&pco=tbxnj-1.0" target="_blank"><img src="https://cache.addthiscdn.com/icons/v3/thumbs/32x32/google_plusone_share.png" border="0" alt="Google+" style="margin-top: 15px;"/></a>


                <hr>
                <img src="{{ checkIfImagesIsExit($buInfo->image) }}" class="img-responsive"/>
                <hr>
                <p>
                    {!! nl2br($buInfo->bu_large_dis) !!}
                </p>
                
                <br>
                
                
                
                <div id="googleMap" style="width:100%;height:380px;"></div>
            </div>
            
            <br>
            
            <div class="profile-content">
                <h3>
                    Others Buildings 
                </h3>
                @include('website.bu.sharefile',['bu'=>$same_rent])
                @include('website.bu.sharefile',['bu'=>$same_type])
             
            </div>
		</div>
	</div>
</div>
<br>
<br>




@endsection


@section('footer')  
<script>
var myCenter=new google.maps.LatLng({{ $buInfo->bu_langtuide }},{{ $buInfo->bu_latitude }});
var marker;

function initialize()
{
var mapProp = {
  center:myCenter,
  zoom:5,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker=new google.maps.Marker({
  position:myCenter,
  animation:google.maps.Animation.BOUNCE
  });

marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
@endsection