@extends('layouts.app')


@section('title')

    Contact Us

@endsection

@section('header')

@endsection
@section('content')
    <br>
    <br>

<div class="container">

    <h1>
        Contact Us
    </h1>

    <div class="row">
        <div class="col-md-8">
            <div class="well well-sm">
               {!! Form::open(['url' => '/contact', 'method' => 'post']) !!}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">
                                    Name</label>
                                <input type="text" name="contact_name" class="form-control" id="name" placeholder="Enter name" required="required" />
                            </div>
                            <div class="form-group">
                                <label for="email">
                                    Email Address</label>
                                <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                    <input type="email" name="contact_email" class="form-control" id="email" placeholder="Enter email" value="{{ \Illuminate\Support\Facades\Auth::user() ? \Illuminate\Support\Facades\Auth::user()->email : '' }}" required="required" /></div>
                            </div>
                            <div class="form-group">
                                <label for="subject">
                                    Subject</label>
                                <select id="subject" name="contact_type" class="form-control" required="required">

                                    @foreach(contact() as $key => $con)

                                        <option value="{{ $key }}">{{ $con }}</option>

                                    @endforeach



                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">
                                    Message</label>
                            <textarea name="contact_message" id="message" class="form-control" rows="9" cols="25" required="required"
                                      placeholder="Message"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="banner_btn pull-right" id="btnContactUs">
                                Send Message</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="col-md-4">
            <form>
                <legend><i class="fa fa-outdent"></i> Our office</legend>
                <address>
                    <strong>Twitter, Inc.</strong><br>
                    {{ nl2br(getSetting('address')) }}
                    <br>
                    <abbr title="Phone">
                        P:</abbr>
                    {{ nl2br(getSetting('mobile')) }}
                </address>
                <br>
                <address>
                    <strong>{{ getSetting() }}</strong><br>
                    <a href="mailto:#">{{ nl2br(getSetting('email')) }}</a>
                </address>
            </form>
        </div>
    </div>
</div>
@endsection