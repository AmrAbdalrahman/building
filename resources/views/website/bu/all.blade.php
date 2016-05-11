@extends('layouts.app')


@section('title')

All Buildings

@endsection

@section('header')

{!!  Html::style('cus/buall.css')  !!}
<style>
    hr{
        margin-top: 10px;
        margin-bottom: 10px;
    }
    .dis{
        padding-bottom: 10px;
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
            
            <ol class="breadcrumb">
  <li><a href="{{ url('/') }}">Home</a></li>
         @if(isset($array))
          @if(!empty($array))
            @foreach($array as $key => $value)
                <li><a href="{{ url('/search?'.$key.'='.$value) }}">{{ searchnamefield()[$key] }} ->
                        @if($key == 'bu_type')
                            {{ bu_type()[$value] }}
                        @elseif($key == 'bu_rent')
                            {{ bu_rent()[$value] }}
                        @elseif($key == 'bu_place')
                        {{ bu_place()[$value] }}
                        @else
                        {{ $value }}
                        @endif
                        
                    </a></li>
            @endforeach
          @endif
         @endif
</ol>
            
            <div class="profile-content">
		@include('website.bu.sharefile',['bu' => $buAll])	
                <div class="text-center">
                    
                    {{ $buAll->appends(Request::except('page'))->render() }}
                    
                    
                </div>
            </div>
		</div>
	</div>
</div>
<br>
<br>




@endsection
