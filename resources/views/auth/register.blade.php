@extends('layouts.app')


@section('title')

Registration page
@endsection
@section('content')
<div class="container">
    <div class="contact_bottom">
        <h3>Register</h3>
   

                 <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {!! csrf_field() !!}

                        <div class="{{ $errors->has('name') ? ' has-error' : '' }}">
                           

                            <div class="col-lg-12 col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="your name">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                            

                            <div class="col-lg-12 col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="your email">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                            

                            <div class="col-lg-6 col-md-6">
                                <input type="password" class="form-control" name="password" placeholder="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            

                            <div class="col-lg-6 col-md-6">
                                <input type="password" class="form-control" name="password_confirmation" placeholder="confirm password">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="pull-left regp">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-warning">
                                    <i class="fa fa-btn fa-user"></i>Register
                                </button>
                            </div>
                        </div>
                    </form>
            
       
    
        </div>
</div>
@endsection
