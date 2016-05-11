@extends('admin.layouts.layout')

@section('title')

Edit Massage
    {{$contact->contact_name}}

@endsection


@section('header')



@endsection


@section('content')

<section class="content-header">
          <h1>
            Edit Member
    {{$contact->contact_name}}
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{url('/adminpanel/contact')}}">Controlling in Massages</a></li>
            <li class="active"><a href="{{url('/adminpanel/contact'.$contact->id.'edit')}}">
                    
                    Edit Member
    {{$contact->contact_name}}</a></li>
            
          </ol>
        </section>


            <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">
                      Edit Member
    {{$contact->contact_name}}</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    
                       {!!  Form::model($contact,['route'=>['adminpanel.contact.update',$contact->id],'method'=>'PATCH'])!!}
                    @include('admin.contact.form')
                       {!! Form::close() !!}

                </div>
                </div>
                </div>
              </div>
        </section>



            
            
            
           
@endsection




@section('footer')


@endsection
