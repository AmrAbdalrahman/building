@extends('admin.layouts.layout')

@section('title')

Add Member

@endsection


@section('header')



@endsection


@section('content')

<section class="content-header">
          <h1>
            Add Member
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{url('/adminpanel/users')}}">Controlling in members</a></li>
            <li class="active"><a href="{{url('/adminpanel/users/create')}}">Add New Member</a></li>
            
          </ol>
        </section>


            <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Add New Member</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    
                       
                       {!!  Form::open(['url'=>'/adminpanel/users','method'=>'post'])!!}
                    @include('admin.user.form')
                     {!! Form::close() !!}
                        

                    
                </div>
                </div>
                </div>
              </div>
        </section>

@endsection




@section('footer')


@endsection
