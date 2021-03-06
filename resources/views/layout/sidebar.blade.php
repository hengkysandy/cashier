<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{url('home')}}" class="site_title"><i class="fa fa-money"></i> <span>Cashier</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{session()->get('userSession')->name}}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>Menu</h3>
                <ul class="nav side-menu">
                    <li>
                        <a href="{{url('home')}}"><i class="fa fa-home"></i>Home</a>
                    </li>
                    <li><a><i class="fa fa-calendar"></i>Report <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{url('profit')}}">Profit</a></li>
                            <li><a href="{{url('selling')}}">Selling</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{url('item')}}"><i class="fa fa-archive"></i>Item</a>
                    </li>
                    @if( session()->get('userSession')->role_id == 1 )
                    <li>
                        <a href="{{url('room')}}"><i class="fa fa-bank"></i>Room</a>
                    </li>
                    
                    <li>
                        <a href="{{url('employee')}}"><i class="fa fa-user"></i>Employee</a>
                    </li>
                    @endif
                    
                </ul>
            </div>
        </div>
    </div>
</div>