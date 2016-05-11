@extends('admin.layouts.layout')

@section('title')

Building Editing
    {{$bu->bu_name}}

@endsection


@section('header')



{!! Html::style('cus/css/select2.css')  !!}


@endsection


@section('content')

<section class="content-header">
          <h1>
            Building Editing
    {{$bu->bu_name}}
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{url('/adminpanel/bu')}}">Controlling in members</a></li>
            <li class="active"><a href="{{url('/adminpanel/bu'.$bu->id.'edit')}}">
                    
                    Building Editing
    {{$bu->bu_name}}</a></li>
            
          </ol>
        </section>


            <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">
                      Building Editing
    {{$bu->bu_name}}</h3>
                </div><!-- /.box-header -->
                <div class="box-body">

                    <div class="col-md-9">
                        @if($user == '')

                            <p>
                                Building Added by visitor
                            </p>
                        @else
                            <p>
                                UserName : {{ $user->name }}
                            </p>
                            <p>
                                Email : {{ $user->email }}
                            </p>
                            <p>
                                Permission :
                                @if($user->admin  == 1)
                                    Admin
                                    @else
                                Member
                                    @endif
                            </p>
                            <p>
                                More <a href="{{ url('/adminpanel/users/'.$user->id.'/edit') }}"> click here</a>
                            </p>
                        @endif
                    </div>
                </div>
                  <div class="clearfix"></div>
                    
                       {!!  Form::model($bu,['route'=>['adminpanel.bu.update',$bu->id],'method'=>'PATCH','files' => true])!!}
                    @include('admin.bu.form')
                       {!! Form::close() !!}
                      
                </div>
                </div>
                </div>
              </div>
        </section>
            
           
@endsection




@section('footer')

{!! Html::script('cus/js/select2.js')  !!}
<script type="text/javascript">
  $('.select2').select2();
</script>
@endsection
