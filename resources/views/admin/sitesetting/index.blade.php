@extends('admin.layouts.layout')

@section('title')

Editing Site Setting

@endsection


@section('header')



@endsection


@section('content')

<section class="content-header">
          <h1>
            Editing Site Setting
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="{{url('/adminpanel/sitesetting')}}">Editing Site Setting</a></li>
            
            
          </ol>
        </section>


            <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">
                      
                      Editing Site Setting
                  </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    
                    
                    <form action="{{ url('/adminpanel/sitesetting') }}" method="post" enctype="multipart/form-data">
   {{csrf_field()}}
                    @foreach($sitesetting as $setting)
                        
                         <div class="{{ $errors->has('name') ? ' has-error' : '' }}">
                             <div class="col-lg-2">
                                 {{ $setting->slug }}
                                 
                             </div>

                            <div class="col-lg-12 col-md-10">
                                @if($setting->type == 0)
                                {!! Form::text($setting->namesetting,$setting->value,['class'=>'form-control']) !!}

                                @elseif($setting->type == 3)
                                  @if($setting->value != '')
                                     <img src="{{ checkIfImagesIsExit($setting->value,'/public/website/slider/','/website/slider/') }}" width="150"/>
                                   
                                  @endif
                                     {!! Form::file($setting->namesetting,null,['class'=>'form-control']) !!}
                                @else
                                {!! Form::textarea($setting->namesetting,$setting->value,['class'=>'form-control']) !!}
                                @endif
                                
                              <br>

                                @if ($errors->has('$setting->namesetting'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('$setting->namesetting') }}</strong>
                                    </span>
                                @endif
                            </div>
                    
                        </div>
                        <div class="clearfix"></div>
                    
                    @endforeach
                    <button name="submit" class="btn btn-app"  type="submit">
                        <i class="fa fa-save"></i>
                        save Site Setting
                    </button>
                    </form>
                </div>
                </div>
                </div>
              </div>
        </section>

@endsection

