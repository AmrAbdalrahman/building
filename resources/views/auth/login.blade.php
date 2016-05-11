@extends('layouts.app')


@section('title')

Login page
@endsection
@section('content')
<div class="container">
    

<div class="contact_bottom">
    <hr>
    <h3>Login</h3>
    <hr>
     <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {!! csrf_field() !!}

                        <div class="text2{{ $errors->has('email') ? ' has-error' : '' }}">
                            

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="your email">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="text2{{ $errors->has('password') ? ' has-error' : '' }}">
                           

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password" placeholder="your password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="">
                            <div class="col-md-6">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" style="margin-bottom: 10px"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="pop">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-warning">
                                    <i class="fa fa-btn fa-sign-in"></i>Login
                                </button>

                                <a class="banner_btn" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>
                        </div>
                    </form>
    
</div>
    <div class="clearfix"></div>
    <br>
    </div>

@endsection
