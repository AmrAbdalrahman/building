@extends('layouts.app')


@section('title')

     Building has been added successfully

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
                        <li class="active"><a href="">Added Done</a></li>


                    </ol>

                    <div class="profile-content">

                        <div class="alert alert-success">
                            <b>
                                Building has been added
                            </b>
                            successfully.......
                    </div>
                </div>
            </div>

        </div>
        </div>

        <br>
        <br>




@endsection
