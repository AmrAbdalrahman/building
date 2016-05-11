@extends('layouts.app')


@section('title')

    Add New Building

@endsection

@section('header')

    {!!  Html::style('cus/buall.css')  !!}

@endsection
@section('content')


        <div class="container">
            <div class="row profile">
                @include('website.bu.pages')

                <div class="col-md-9">

                    <ol class="breadcrumb">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('/user/create/building') }}">Add New Building</a></li>

                    </ol>

                    <div class="profile-content">
                        {!!  Form::open(['url'=>'/user/create/building','method'=>'post','files' => true])!!}
                        @include('admin.bu.form',['user' => 1])
                        {!! Form::close() !!}

                    </div>
                </div>

            </div>
        </div>
        <br>
        <br>




@endsection
