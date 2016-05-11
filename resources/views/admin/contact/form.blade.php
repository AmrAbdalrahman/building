<div class="{{ $errors->has('contact_name') ? ' has-error' : '' }}">

    <div class="col-md-10 pull-right">

        {!! Form::text("contact_name" ,null,['class'=>'form-control']) !!}
        <br>

        @if ($errors->has('contact_name'))
            <span class="help-block">
                                        <strong>{{ $errors->first("contact_name") }}</strong>
                                    </span>
        @endif
    </div>
    <div class=" col-md-2 pull-left">
        The sender's name
    </div>

</div>
<div class="clearfix"></div>



<div class="{{ $errors->has('contact_email') ? ' has-error' : '' }}">


    <div class="col-md-10 pull-right">

        {!! Form::text("contact_email" ,null,['class'=>'form-control']) !!}
        <br>

        @if ($errors->has('contact_email'))
            <span class="help-block">
                                        <strong>{{ $errors->first("contact_email") }}</strong>
                                    </span>
        @endif
    </div>
    <div class=" col-md-2 pull-left">
       Email
    </div>

</div>
<div class="clearfix"></div>



<div class="clearfix"></div>


<div class="{{ $errors->has('contact_message') ? ' has-error' : '' }}">


    <div class="col-md-10 pull-right">

        {!! Form::textarea("contact_message" ,null,['class'=>'form-control']) !!}
        <br>

        @if ($errors->has('contact_message'))
            <span class="help-block">
                                        <strong>{{ $errors->first("contact_message") }}</strong>
                                    </span>
        @endif
    </div>
    <div class=" col-md-2 pull-left">
        Message
    </div>

</div>
<div class="clearfix"></div>


<div class="{{ $errors->has('contact_type') ? ' has-error' : '' }}">


    <div class="col-md-10 pull-right">

        {!! Form::select("contact_type" ,contact(),null,['class'=>'form-control']) !!}
        <br>

        @if ($errors->has('contact_type'))
            <span class="help-block">
                                        <strong>{{ $errors->first("contact_type") }}</strong>
                                    </span>
        @endif
    </div>
    <div class=" col-md-2 pull-left">
        Massage Type
    </div>

</div>
<div class="clearfix"></div>

<div class="{{ $errors->has('contact_type') ? ' has-error' : '' }}">


    <div class="col-md-12">

        {!! Form::submit("Done" ,['class'=>'btn btn-warning']) !!}
        <br>

    </div>


</div>
<div class="clearfix"></div>

