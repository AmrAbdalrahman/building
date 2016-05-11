<div class="col-md-3">
@if(Auth::user())

	<div class="profile-sidebar" >
		<h2 style="margin-left: 15px;">Member Options</h2>
		<div class="profile-usermenu">
			<ul class="nav">
				<li class="{{ setActive(['user','editsetting']) }}">

					<a href="{{ url('/user/editsetting') }}">
						<i class="fa fa-edit"></i>
						Editing Personal Information </a>
				</li>
				<li class="{{ setActive(['user','buildingshow']) }}">
					<a href="{{ url('/user/buildingshow') }}">
						<i class="fa fa-check"></i>
						 Buildings Activation
					<label class="label label-default pull-right">
						{{ buforusercount(Auth::user()->id,1 ) }}
					</label>
					</a>
				</li>

				<li class="{{ setActive(['user','buildingshowwaiting']) }}">
					<a href="{{ url('/user/buildingshowwaiting') }}">
						<i class="fa fa-clock-o"></i>
						Buildings pending for Activate
						<label class="label label-default pull-right">
							{{ buforusercount(Auth::user()->id,0 ) }}
						</label>
					</a>
				</li>

				<li class="{{ setActive(['user','create','building']) }}">
					<a href="{{ url('/user/create/building') }}">
						<i class="fa fa-plus"></i>
						Add Building </a>
				</li>

			</ul>
		</div>
	</div>
	<br>

@endif


    <div class="profile-sidebar" >
                            <h2 style="margin-left: 15px;">Building Options</h2>


				<div class="profile-usermenu">
					<ul class="nav">
						<li class="{{ setActive(['ShowAllBuilding']) }}">
							<a href="{{ url('/ShowAllBuilding') }}">
								<i class="fa fa-building"></i>
							All Building </a>
						</li>
						<li class="{{ setActive(['forRent']) }}">
							<a href="{{ url('/forRent') }}">
							<i class="fa fa-calendar"></i>
							Rent </a>
						</li>
                         <li class="{{ setActive(['forBuy']) }}">
							<a href="{{ url('/forBuy') }}">
							<i class="fa fa-building-o"></i>
							Ownership </a>
						</li>
                         <li class="{{ setActive(['type','0']) }}">
							<a href="{{ url('/type/0') }}">
						<i class="fa fa-flag"></i>
							Flats </a>
						</li>
                       <li class="{{ setActive(['type','1']) }}">
							<a href="{{ url('/type/1') }}">
							<i class="fa fa-home"></i>
							Villa </a>
						</li>
                      <li class="{{ setActive(['type','2']) }}">
							<a href="{{ url('/type/2') }}">
							<i class="fa fa-institution"></i>
							Chalet </a>
						</li>
                                                
					</ul>
				</div>
				<!-- END MENU -->
			</div>
    <br>

                    <div class="profile-sidebar">
                            <h2 style="margin-left: 15px;">Advanced Search</h2>
                                    
				<div class="profile-usermenu" style="padding: 10px;">
                                    {!! Form::open(['url' => 'search', 'method' => 'get'])  !!}
					<ul class="nav">
                                            <li>
                                                    {!! Form::text("bu_price_from",null,['class' => 'form-control','placeholder'=>'Building price From'])  !!}
						</li>
                                            <li>
                                                    {!! Form::text("bu_price_to",null,['class' => 'form-control','placeholder'=>'Building price To'])  !!}
						</li>
                                                
                                                <li>
                                                    {!! Form::select("bu_place",bu_place(),null,['class' => 'form-control select2','placeholder'=>'Building place'])  !!}
						</li >
                                                <br>
                                                <li>
                                                    {!! Form::select("rooms",roomnumber(),null,['class' => 'form-control','placeholder'=>'Rooms Number'])  !!}
						</li>
                                                <li>
                                                    {!! Form::select("bu_type",bu_type(),null,['class' => 'form-control','placeholder'=>'Building Type'])  !!}
						</li>
						<li>
                                                    {!! Form::select("bu_rent",bu_rent(),null,['class' => 'form-control','placeholder'=>'Operation Kind'])  !!}
						</li>
                                     
                                                <li>
                                                    {!! Form::text("bu_square",null,['class' => 'form-control','placeholder'=>'Area'])  !!}
						</li>
                                                <li >
                                                    {!! Form::submit("Search",['class' => 'banner_btn'])  !!}
						</li>
                                                
					</ul>
                                    {!! Form::close()  !!}
				</div>
				<!-- END MENU -->
			</div>
                    
                    
                    
		</div>