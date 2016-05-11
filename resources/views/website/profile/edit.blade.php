@extends('layouts.app')


@section('title')

    Editing Personal Information for member {{ $user->name }}

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
                        <li class="active"><a href="{{ url('/') }}">Editing Personal Information for member {{ $user->name }}</a></li>

                    </ol>

                    <div class="profile-content">
                        <h2>

                            Editing Email and Name

                        </h2>
                        <hr>
                        {!!  Form::model($user,['route' => ['user.editsetting',$user->id],'method'=>'PATCH'])!!}
                        @include('admin.user.form',['showforuser' => 1])
                        {!! Form::close() !!}
                        <div class="clearfix"></div>



                        {{-- change password  --}}

                        <hr>
                        <h2>

                            Editing Password

                        </h2>
                        {!!  Form::open(['url'=>'/user/changepassword','method'=>'post'])!!}


                        <div class="{{ $errors->has('password') ? ' has-error' : '' }}">


                            <div class=" col-md-12">
                                <input style="margin-bottom: 15px" type="password" class="form-control" name="password" placeholder="Enter old password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="clearfix"></div>

                            <div class=" col-md-12">
                                <input style="margin-bottom: 15px" type="password" class="form-control" name="newpassword" placeholder="Enter New password">

                                @if ($errors->has('newpassword'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('newpassword') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="clearfix"></div>
                            <div class="col-md-2">
                                <button  type="submit" class="btn btn-warning">
                                    <i class="fa fa-btn fa-user"></i>Change Password
                                </button>

                            </div>
                            <div class="clearfix"></div>

                        </div>


                        {!! Form::close() !!}





                    </div>


                </div>

            </div>
        </div>
        <br>
        <br>




@endsection
