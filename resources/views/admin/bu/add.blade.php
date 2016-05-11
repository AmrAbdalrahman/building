@extends('admin.layouts.layout')

@section('title')

Add New Building

@endsection


@section('header')

{!! Html::style('cus/css/select2.css')  !!}

@endsection


@section('content')

<section class="content-header">
          <h1>
            Add New Building
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{url('/adminpanel/bu')}}">Controlling in Buildings</a></li>
            <li class="active"><a href="{{url('/adminpanel/bu/create')}}">Add New Building</a></li>
            
          </ol>
        </section>


            <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Add New Building</h3>
                </div><!-- /.box-header -->
                <div class="box-body">

                    <div>




                    {!!  Form::open(['url'=>'/adminpanel/bu','method'=>'post','files' => true])!!}
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
