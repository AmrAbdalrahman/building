@extends('layouts.app')


@section('title')

     Buildings Member {{ $user->name }}

@endsection

@section('header')

    {!!  Html::style('cus/buall.css')  !!}

@endsection
@section('content')

    <div class="container">

        <div class="container">
            <div class="row profile">
                @include('website.bu.pages')

                <div class="col-md-9">

                    <ol class="breadcrumb">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('/ShowAllBuilding') }}">All Buildings</a></li>
                        <li class="active"><a href="{{ url('/ShowAllBuilding') }}">Buildings Member {{ $user->name }}</a></li>
                    </ol>

                    <div class="profile-content">
                        @include('website.bu.sharefile',['bu' => $bu])
                        <div class="text-center">

                            {{ $bu->appends(Request::except('page'))->render() }}


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>




@endsection
