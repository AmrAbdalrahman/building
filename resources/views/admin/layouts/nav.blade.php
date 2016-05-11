<li><a href="{{url('/adminpanel')}}">
        <i class="fa fa-home"></i> <span>Controlling Settings</span> </a></li>
<li><a href="{{url('/adminpanel/sitesetting')}}">
        <i class="fa fa-gears"></i> <span>Main Settings</span> </a></li>

                {{-- users --}}
                
  <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Controlling in members</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="{{url('/adminpanel/users/create')}}">
                        <i class="fa fa-circle-o"></i> Add members</a></li>
                <li><a href="{{url('/adminpanel/users')}}">
                        <i class="fa fa-circle-o"></i> All members</a>
                </li>
              </ul>
                </li>
                
                {{-- Bu --}}
                
  <li class="treeview">
              <a href="#">
                <i class="fa fa-building"></i>
                <span>Controlling in Buildings</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="{{url('/adminpanel/bu/create')}}">
                        <i class="fa fa-circle-o"></i> Add Building</a></li>
                <li><a href="{{url('/adminpanel/bu')}}">
                        <i class="fa fa-circle-o"></i> All Buildings</a>
                </li>
              </ul>
                </li>

  {{-- Contact --}}

<li><a href="{{url('/adminpanel/contact')}}">
        <i class="fa fa-envelope-o"></i> <span>Messages</span></a>
</li>


{{-- Contact --}}

<li><a href="{{url('/adminpanel/buYear/statistics')}}">
        <i class="fa fa-bar-chart"></i> <span>statistics</span> </a>
</li>
