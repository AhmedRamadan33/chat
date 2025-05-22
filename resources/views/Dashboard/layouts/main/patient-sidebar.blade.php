<!-- main-sidebar -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="/"><img src="{{URL::asset('Dashboard/img/brand/logo.png')}}" class="main-logo" alt="logo"></a>
        <a class="desktop-logo logo-dark active" href="/"><img src="{{URL::asset('Dashboard/img/brand/logo-white.png')}}" class="main-logo dark-theme" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-light active" href="/"><img src="{{URL::asset('Dashboard/img/brand/favicon.png')}}" class="logo-icon" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-dark active" href="/"><img src="{{URL::asset('Dashboard/img/brand/favicon-white.png')}}" class="logo-icon dark-theme" alt="logo"></a>
    </div>
    <div class="main-sidemenu">
        <div class="app-sidebar__user clearfix">
            <div class="dropdown user-pro-body">
                <div class="">
                    <img alt="user-img" class="avatar avatar-xl brround" src="{{URL::asset('Dashboard/img/faces/6.jpg')}}"><span class="avatar-status profile-status bg-green"></span>
                </div>
                <div class="user-info">
                    <h4 class="font-weight-semibold mt-3 mb-0">{{ Auth::user()->name }}</h4>
                    <span class="mb-0 text-muted">{{ Auth::user()->email }}</span>
                </div>
            </div>
        </div>
        <ul class="side-menu">
   

            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#"><i class="fa-solid fa-comment-dots mr-2 fa-style"></i><span class="side-menu__label">Chat</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{route('user.list')}}">doctors List</a></li>
                    <li><a class="slide-item" href="{{route('user.chat')}}">Last Chat</a></li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
<!-- main-sidebar -->
