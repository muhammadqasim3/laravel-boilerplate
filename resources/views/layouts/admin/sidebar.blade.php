<aside class="left-sidebar">
    <ul class="nav-bar  @if(!auth()->check()) d-none @endif navbar-inverse hidden-xs-down">
        <!-- <li class="nav-item"><a class="nav-link navbar-toggler sidebartoggler  waves-effect waves-dark float-right"
                                href="javascript:void(0)"><span class="navbar-toggler-icon"></span></a></li> -->
    </ul>
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        @if(auth()->check())

            <nav class="sidebar-nav ">
                <ul id="sidebarnav">
                    <li class="clearfix"></li>
                    @if(auth()->user()->isAdmin() == true)

                        <li class=""><a class="has-arrow waves-effect waves-dark" href="{{url('dashboard')}}" aria-expanded="false"><i class="flaticon-desktop-computer-screen-with-rising-graph"></i>
                            <span class="hide-menu">Home</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{url('admin/dashboard')}}" class=""><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a></li>
                                <li><a href="{{ URL('') }}" target="_blank" class=""><i class="fa fa-globe" aria-hidden="true"></i> Visit Website</a></li>
                                <li><a href="{{url('admin/favicon/edit')}}" class=""><i class="fa fa-facebook" aria-hidden="true"></i> Favicon Management</a></li>
                                <li><a href="{{url('admin/logo/edit')}}" class=""><i class="fa fa-modx" aria-hidden="true"></i> Logo Management</a></li>
                                <li><a href="{{url('admin/banner')}}" class=""><i class="fab fa-blogger-b"></i> Banner Management</a></li>
                                <li><a href="{{url('admin/config/setting')}}" class=""><i class="fa fa-cogs" aria-hidden="true"></i> Config</a></li>
                            </ul>
                        </li>
                         <hr>

                        <li>
                            <a class="has-arrow waves-effect waves-dark" href="{{url('dashboard')}}" aria-expanded="false"><i class="fas fa-envelope"></i>
                            <span class="hide-menu">Inquires</span></a>
                            <ul aria-expanded="false" class="collapse">
                            <li><a href="{{url('admin/contact/inquiries')}}" class="">Contact Inquiries</a></li>
                            <li><a href="{{url('admin/request/inquiries')}}" class="">Request Inquiries</a></li>
                            </ul>
                        </li>
                        <li><hr></li>

{{--                    <li><a href="{{url('admin/faq')}}"><i class="fa fa-question-circle-o" aria-hidden="true"></i><span class="hide-menu">FAQ</span></a>--}}
{{--                    </li>--}}
{{--                    <li><hr></li>--}}
{{--                    <li><a href="{{url('admin/service')}}"><i class="fa fa-scribd" aria-hidden="true"></i><span class="hide-menu">Service</span></a>--}}
{{--                    </li>--}}
{{--                    <li><hr></li>--}}
                    @else
                        <li class="">
                            <a class="" href="{{url('dashboard')}}" aria-expanded="false">
                            <i class="flaticon-desktop-computer-screen-with-rising-graph"></i>
                            <span class="hide-menu">Dashboard</span></a>
                        </li>
                    @endif

                    @foreach($laravelAdminMenus->menus as $section)
                        @if(count(collect($section->items)) > 0)
                            @foreach($section->items as $menu)
                                @can('view-'.str_slug($menu->title))
                                    <li>
                                        <a class="waves-effect" href="{{ url($menu->url) }}">
                                            <i class="{{$menu->icon}}"></i>
                                            <span class="hide-menu">  {{ $menu->title }}</span>
                                        </a>
                                    </li>
                                    <hr>
                                @endcan
                            @endforeach
                        @endif
                    @endforeach

                    <li><a href="{{url('admin/account/settings')}}"><i class="fa fa-cog"></i><span class="hide-menu">Account Settings</span></a>
                    </li>
                    @if(auth()->user()->isAdmin() == true)
                        <li>
                            <hr>
                        </li>
                    @endif
                </ul>

            </nav>
    @endif
    <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
