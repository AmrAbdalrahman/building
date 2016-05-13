@if(count($bu)>0)

@foreach($bu as $key => $b)
@if($key % 3 == 0 && $key != 0)
    <div class="clearfix"></div>
    @endif
    
    <div class="col-md-4">
      <div class="productbox">
        <img src="{{ checkIfImagesIsExit($b->image,'/public/website/thum/','/website/thum/') }}" class="img-responsive">
        <div class="producttitle">{{ $b->bu_name }}</div>
        <p class="text-justify dis">{{ str_limit($b->bu_small_dis,20)  }}</p>
        <div class="productprice">
            <span>
                Area :
                {{ $b->bu_square }}
           </span>
            <div class="clearfix"></div>
            <span >
                Place :
                {{ bu_place()[$b->bu_place] }}
           </span>
            <div class="clearfix"></div>
            <span>
                Operation:
                {{ bu_rent()[$b->bu_rent] }}
           </span>
            <div class="clearfix"></div>
            <div class="clearfix"></div>
            
             <span>
                Building Type :
                {{ bu_type()[$b->bu_type] }}
           </span>


            <div class="clearfix"></div>
            
            <hr>
            <div class="pricetext pull-left ">{{ $b->bu_price }}</div></div>
        <div class="pull-right  pp">

            @if($b->bu_status == 0 && $b->user_id == "")
                <a class="btn btn-warning btm-sm pull-right pw"  href="{{ url('/user/edit/building/'.$b->id) }}">Building Editing</a>
                <span class="btn btn-danger btm-sm pw" role="button">Waiting for Activation
                    <span  style="color: #fff;"></span></span></div>

              @else

             <a href="{{ url('/SingleBuilding/'.$b->id) }}" class="btn btn-primary btm-sm" role="button">More Details
                 <span class="fa fa-arrow-circle-o-right" style="color: #fff;"></span></a></div>
            @endif

        <div class="clearfix"></div>
      </div>
    </div>
   
    
@endforeach
 
<div class="clearfix"></div>
    <br>
@else
<div class="alert alert-danger">
    No building to show
</div>
@endif
