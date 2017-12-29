<!-- START LEFT SIDEBAR NAV-->
<aside id="left-sidebar-nav">
    <ul id="slide-out" class="side-nav fixed leftside-navigation avatar-area">
        <li class="user-details">
            <div class="row">
                <div class="col col s4 m4 l4">
                    <img src="{{asset('img')}}/avatar.jpg" alt="" class="circle responsive-img valign profile-image">
                </div>
                <div class="col col s8 m8 l8">
                    <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">{{Auth::user()->name}}<i class="mdi-navigation-arrow-drop-down right"></i></a>
                    <p class="user-roal">
                        @foreach(Auth::user()->getRoleNames() as $role)
                            {{$role}}
                        @endforeach
                    </p>
                    <a href="{{route('impersonate.leave')}}">Leave Impersonate</a>
                </div>
            </div>
        </li>
        <li class="bold"><a href="{{route('users.index')}}" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Users</a>
        </li>
    </ul>
    <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
</aside>
<!-- END LEFT SIDEBAR NAV-->

<!-- //////////////////////////////////////////////////////////////////////////// -->