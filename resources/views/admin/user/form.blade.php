

                        {!! csrf_field() !!}

                        <div class="{{ $errors->has('name') ? ' has-error' : '' }}">


                            <div class=" col-md-12">
                                {!! Form::text("name",null,['class'=>'form-control']) !!}

                              <br>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="clearfix"></div>


                            @if(!isset($showforuser))
                        
                         <div class="{{ $errors->has('admin') ? ' has-error' : '' }}">


                            <div class="col-md-12">
                                {!! Form::select("admin",['0'=>'user','1'=>'admin'],null,['class'=>'form-control']) !!}



                                @if ($errors->has('admin'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('admin') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <br>
                            @endif
                        <div class="{{ $errors->has('email') ? ' has-error' : '' }}">


                            <div class="col-md-12">
                                {!! Form::text("email",null,['class'=>'form-control']) !!}
                                <br>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                      @if(!isset($user))
                        <div class="{{ $errors->has('password') ? ' has-error' : '' }}">


                            <div class="col-lg-6 col-md-6">
                                <input style="margin-bottom: 15px" type="password" class="form-control" name="password" placeholder="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">


                            <div class="col-lg-6 col-md-6">
                                <input style="margin-bottom: 15px" type="password" class="form-control" name="password_confirmation" placeholder="confirm password">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       @endif

                        <div class="pull-left regp">
                            <div class="col-md-6">
                                <button style="margin-bottom: 15px" type="submit" class="btn btn-warning">
                                    <i class="fa fa-btn fa-user"></i>Done
                                </button>
                            </div>
                        </div>