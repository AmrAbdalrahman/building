 
                 
                        {!! csrf_field() !!}

                        <div class="{{ $errors->has('bu_name') ? ' has-error' : '' }}">
                           
                            <label class="col-md-3">
                                Building Name
                            </label>

                            <div class="col-md-9">
                                {!! Form::text("bu_name",null,['class'=>'form-control']) !!}
                                
                              <br>

                                @if ($errors->has('bu_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bu_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        
                        
                        <div class="{{ $errors->has('bu_price') ? ' has-error' : '' }}">
                           
                            <label class="col-md-3">
                                Building Price
                            </label>

                            <div class="col-md-9">
                                {!! Form::text("bu_price",null,['class'=>'form-control']) !!}
                                
                              <br>

                                @if ($errors->has('bu_price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bu_price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        
                         <div class="{{ $errors->has('rooms') ? ' has-error' : '' }}">
                           
                            <label class="col-md-3">
                                Rooms Numbers
                            </label>

                            <div class="col-md-9">
                                {!! Form::select("rooms",roomnumber(),null,['class'=>'form-control']) !!}
                                
                              <br>

                                @if ($errors->has('rooms'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rooms') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        
                         <div class="{{ $errors->has('bu_rent') ? ' has-error' : '' }}">
                           
                            <label class="col-md-3">
                                Building Kind
                            </label>

                            <div class="col-md-9">
                                {!! Form::select("bu_rent",bu_rent(),null,['class'=>'form-control']) !!}
                                
                              <br>

                                @if ($errors->has('bu_rent'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bu_rent') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        
                        <div class="{{ $errors->has('bu_square') ? ' has-error' : '' }}">
                           
                            <label class="col-md-3">
                                Building square
                            </label>

                            <div class="col-md-9">
                                {!! Form::text("bu_square",null,['class'=>'form-control']) !!}
                                
                              <br>

                                @if ($errors->has('bu_square'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bu_square') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        
                        
                         <div class="{{ $errors->has('bu_type') ? ' has-error' : '' }}">
                           
                            <label class="col-md-3">
                                Building type
                            </label>

                            <div class="col-md-9">
                                {!! Form::select("bu_type",bu_type(),null,['class'=>'form-control']) !!}
                                
                              <br>

                                @if ($errors->has('bu_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bu_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="clearfix"></div>

                        @if(isset($user))
                         <div class="{{ $errors->has('bu_status') ? ' has-error' : '' }}">
                           
                            <label class="col-md-3">
                                Building status
                            </label>

                            <div class="col-md-9">
                                {!! Form::select("bu_status",bu_status(),null,['class'=>'form-control']) !!}
                                
                              <br>

                                @if ($errors->has('bu_status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bu_status') }}</strong>
                                    </span>
                                @endif
                            </div>
                             
                        </div>
                         @endif
                        
                        <div class="clearfix"></div>
                        
                        
                        
                        <div class="{{ $errors->has('bu_place') ? ' has-error' : '' }}">
                           
                            <label class="col-md-3">
                                place
                            </label>

                            <div class="col-md-9">
                                {!! Form::select("bu_place",bu_place(),null,['class'=>'form-control select2']) !!}
                                
                              <br>

                                @if ($errors->has('bu_place'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bu_place') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        
                        <br>
                        
                        <div class="{{ $errors->has('images') ? ' has-error' : '' }}">
                           
                            <label class="col-md-3">
                                Building Image
                            </label>

                            <div class="col-md-9">
                                @if(isset($bu))
                                @if($bu->image != '')
                                <img src="{{ Request::root().'/website/bu_images/'.$bu->image }}" width="100"/>
                                <div class="clearfix"></div>
                                <br>
                                @endif
                                @endif
                                {!! Form::file("image",null,['class'=>'form-control']) !!}
                                
                           

                                @if ($errors->has('images'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('images') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        
                        <br>
                        
                        <div class="{{ $errors->has('bu_meta') ? ' has-error' : '' }}">
                           
                            <label class="col-md-3">
                                Keywords
                            </label>

                            <div class="col-md-9">
                                {!! Form::text("bu_meta",null,['class'=>'form-control']) !!}
                                
                              <br>

                                @if ($errors->has('bu_meta'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bu_meta') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="clearfix"></div>

                        @if(!isset($user))
                        
                        <div class="{{ $errors->has('bu_small_dis') ? ' has-error' : '' }}">
                           
                            <label class="col-md-3">
                                Building Description for search engine
                            </label>

                            <div class="col-md-9">
                                {!! Form::textarea("bu_small_dis",null,['class'=>'form-control','rows'=> '4']) !!}
                                
                              <br>

                                @if ($errors->has('bu_small_dis'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bu_small_dis') }}</strong>
                                    </span>
                                @endif
                                <div class="alert alert-warning">
                                    cant input more than 160 characters according to google standards
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="clearfix"></div>
                        
                        
                        <div class="{{ $errors->has('bu_langtuide') ? ' has-error' : '' }}">
                           
                            <label class="col-md-3">
                                longitude
                            </label>

                            <div class="col-md-9">
                                {!! Form::text("bu_langtuide",null,['class'=>'form-control']) !!}
                                
                              <br>

                                @if ($errors->has('bu_langtuide'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bu_langtuide') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        
                          <div class="{{ $errors->has('bu_latitude') ? ' has-error' : '' }}">
                           
                            <label class="col-md-3">
                                Latitude
                            </label>

                            <div class="col-md-9">
                                {!! Form::text("bu_latitude",null,['class'=>'form-control']) !!}
                                
                              <br>

                                @if ($errors->has('bu_latitude'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bu_latitude') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        
                         <div class="{{ $errors->has('bu_large_dis') ? ' has-error' : '' }}">
                           
                            <label class="col-md-3">
                                Large description for building
                            </label>

                            <div class="col-md-9">
                                {!! Form::textarea("bu_large_dis",null,['class'=>'form-control']) !!}
                                
                              <br>

                                @if ($errors->has('bu_large_dis'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bu_large_dis') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        
                        
                       
                       
                        <div class="pull-left regp">
                            <div class="col-md-6">
                                <button style="margin-bottom: 15px" type="submit" class="btn btn-warning">
                                    <i class="fa fa-btn fa-user"></i>Done
                                </button>
                            </div>
                        </div>
                        <div class="clearfix"></div>