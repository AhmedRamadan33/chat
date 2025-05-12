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
            <li class="side-item side-item-category">Dashboard Patient</li>
            <li class="slide">
                <a class="side-menu__item" href="/"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3"/><path d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z"/></svg><span class="side-menu__label">Dashboard</a>
            </li>

            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#"><i class="fa-solid fa-comment-dots mr-2 fa-style"></i><span class="side-menu__label">Chat</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{route('user.list')}}">doctors List</a></li>
                    <li><a class="slide-item" href="{{route('user.chat')}}">Last Chat</a></li>
                </ul>
            </li>

            {{-- <li class="slide">
                <a class="side-menu__item"  href="{{route('patient.invoices')}}"> <i class="fa-solid fa-file-invoice-dollar mr-2 fa-style"></i> <span class="side-menu__label">Invoices</span></a>
            </li>

            <li class="slide">
                <a class="side-menu__item"  href="{{route('patient.rays')}}"> <i class="fa-solid fa-x-ray mr-2 fa-style"></i> <span class="side-menu__label">Rays</span></a>
            </li>

            <li class="slide">
                <a class="side-menu__item"  href="{{route('patient.labs')}}"><i class="fa-solid fa-magnifying-glass-chart mr-2 fa-style"></i> <span class="side-menu__label">Analysis</span></a>
            </li>

            <li class="slide">
                <a class="side-menu__item"  href="{{route('patient.payments')}}"> <i class="fa-solid fa-money-check-dollar mr-2 fa-style"></i> <span class="side-menu__label">Payments</span></a>
            </li>

            <li class="slide mb-5">
                <a class="side-menu__item" href="{{ route('profile.index') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M15 11V4H4v8.17l.59-.58.58-.59H6z" opacity=".3"/><path d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-5 7c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10zM4.59 11.59l-.59.58V4h11v7H5.17l-.58.59z"/></svg><span class="side-menu__label">Profile</a>
            </li> --}}

        </ul>
    </div>
</aside>
<!-- main-sidebar -->
