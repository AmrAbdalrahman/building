@extends('admin.layouts.layout')

@section('title')

Edit Member
    {{$user->name}}

@endsection


@section('header')



@endsection


@section('content')

    <section class="content">

    <div class="row">

        <div class="col-lg-3">

            <section class="content-header">
                <h4 class="pull-left" style="margin-bottom: 20px">
                    Edit Member
                    {{$user->name}}


                </h4>


            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">
                                    Edit Member
                                    {{$user->name}}</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">

                                {!!  Form::model($user,['route'=>['adminpanel.users.update',$user->id],'method'=>'PATCH'])!!}
                                @include('admin.user.form')
                                {!! Form::close() !!}

                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">
                                    Change password member
                                    {{$user->name}}</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">


                                {!!  Form::open(['url'=>'/adminpanel/users/changepassword/','method'=>'post'])!!}
                                <input type="hidden" value="{{ $user->id }}" name="user_id"/>

                                <div class="{{ $errors->has('password') ? ' has-error' : '' }}">


                                    <div class=" col-md-12">
                                        <input style="margin-bottom: 15px" type="password" class="form-control" name="password" placeholder="password">

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                    <div class="clearfix"></div>
                                    <br>
                                    <div class="pull-left regp">
                                        <div class="col-md-12">
                                            <button style="margin-bottom: 15px" type="submit" class="btn btn-warning">
                                                <i class="fa fa-btn fa-user"></i>Change Password
                                            </button>
                                            @if($user->id != 1)
                                                <a href="{{url('/adminpanel/users/'.$user->id.'/delete')}}" class="btn btn-danger btn-circle"><i class="fa fa-trash-o"></i>Delete Member</a>
                                            @endif
                                        </div>
                                    </div>

                                </div>


                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>

        <div class="col-md-9" >
            <ol class="breadcrumb pull-right">
                <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{url('/adminpanel/users')}}">Controlling in members</a></li>
                <li class="active"><a href="{{url('/adminpanel/users/'.$user->id.'/edit')}}">

                        Edit Member
                        {{$user->name}}</a></li>
            </ol>
            <div class="clearfix"></div>

            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li ><a href="#activity" data-toggle="tab">Buildings not activated</a></li>
                    <li class="active"><a href="#timeline" data-toggle="tab">Buildings Activated</a></li>

                </ul>
                <div class="tab-content">
                    <div class=" tab-pane" id="activity">

                        <table class="table table-bordered">

                            <tr>

                                <td>
                                    Building Name
                                </td>
                                <td>Added at</td>
                                <td>Building type</td>
                                <td>Building price</td>
                                <td>Building place</td>
                                <td>Building square</td>
                                <td>Operation Kind</td>
                                <td>
                                    Change Building Status
                                </td>
                            </tr>
                        @foreach($buwaiting as $waiting)
                            <tr>
                                <td>
                                    <a href="{{ url('/adminpanel/bu/'.$waiting->id.'/edit') }}">   {{ $waiting->bu_name }}</a>
                                </td>

                                <td>  {{ $waiting->created_at }} </td>
                                <td>
                                    {{ bu_type()[$waiting->bu_type] }}
                                </td>
                                <td>
                                    {{ $waiting->bu_price }}
                                </td>
                                <td>
                                    {{ bu_place()[$waiting->bu_place] }}
                                </td>
                                <td>
                                    {{ $waiting->bu_square }}
                                </td>
                                <td>
                                    {{ bu_rent()[$waiting->bu_rent] }}
                                </td>
                                <td>
                                    <a href="{{ url('/adminpanel/change_status/'.$waiting->id.'/1') }}"> Activate Building</a>
                                </td>
                            </tr>
                            @endforeach

                            <div class="text-center">

                                {{ $buwaiting->appends(Request::except('page'))->render() }}


                            </div>
                            </table>

                    </div><!-- /.tab-pane -->
                    <div class="active tab-pane" id="timeline">

                        <table class="table table-bordered">

                            <tr>

                                <td>
                                    Building Name
                                </td>
                                <td>Added at</td>
                                <td>Building type</td>
                                <td>Building price</td>
                                <td>Building place</td>
                                <td>Building square</td>
                                <td>Operation Kind</td>
                                <td>
                                    Change Building Status
                                </td>
                            </tr>
                            @foreach($buenable as $waiting)

                                <tr>
                                    <td>
                                        <a href="{{ url('/adminpanel/bu/'.$waiting->id.'/edit') }}">   {{ $waiting->bu_name }}</a>
                                    </td>

                                    <td>  {{ $waiting->created_at }} </td>
                                    <td>
                                        {{ bu_type()[$waiting->bu_type] }}
                                    </td>
                                    <td>
                                        {{ $waiting->bu_price }}
                                    </td>
                                    <td>
                                        {{ bu_place()[$waiting->bu_place] }}
                                    </td>
                                    <td>
                                        {{ $waiting->bu_square }}
                                    </td>
                                    <td>
                                        {{ bu_rent()[$waiting->bu_rent] }}
                                    </td>
                                    <td>
                                        <a href="{{ url('/adminpanel/change_status/'.$waiting->id.'/0') }}"> Deactivate Building</a>
                                    </td>
                                </tr>

                            @endforeach


                        </table>

                        <div class="text-center">

                            {{ $buenable->appends(Request::except('page'))->render() }}


                        </div>

                    </div><!-- /.tab-pane -->


                </div><!-- /.tab-content -->
            </div><!-- /.nav-tabs-custom -->
        </div>

    </div>

    </section>


            
           
@endsection

@section('footer')


@endsection
