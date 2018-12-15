<nav class="navbar navbar-dark bg-dark fixed-top navbar-expand-lg">
    {{--<nav class="navbar navbar-expand-md navbar-light navbar-laravel">--}}
    <div class="container">
        <a class="navbar-brand" href="{{ url('/followUserPost') }}">
        <!-- {{ config('app.name', 'Laravel') }} -->
            <strong><i style="font-size: 20px;" class="fas fa-utensils"></i> MyRecipes</strong>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item {{ Request::segment(1) === 'login' ? 'active' : null }}"><a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> {{ __('Login') }}</a></li>
                    <li class="nav-item {{ Request::segment(1) === 'register' ? 'active' : null }}"><a class="nav-link" href="{{ route('register') }}"><i class="fas fa-user-plus"></i> {{ __('Register') }}</a></li>
                @else
                    {{--<li class="dropdown">--}}
                    {{--<a class="dropdown-toggle" id="notifications" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">--}}
                    {{--<span class="glyphicon glyphicon-user"></span>--}}
                    {{--</a>--}}
                    {{--<ul class="dropdown-menu" aria-labelledby="notificationsMenu" id="notificationsMenu">--}}
                    {{--<li class="dropdown-header">No notifications</li>--}}
                    {{--</ul>--}}
                    {{--</li>--}}
                    <li class="nav-item {{ Request::segment(1) === 'followUserPost' ? 'active' : null }}">
                        <a id="navbar" href="{{ route('followUserPost') }}" class="nav-link"  role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fas fa-home"></i> Home <span class="caret"></span>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::segment(1) === 'community' ? 'active' : null }}">
                        <a id="navbar" href="{{ route('community') }}" class="nav-link"  role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fas fa-users"></i> Community <span class="caret"></span>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::segment(1) === 'categories' ? 'active' : null }}">
                        <a id="navbar" href="{{ route('categories') }}" class="nav-link"  role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fas fa-th"></i> Categories <span class="caret"></span>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::segment(1) === 'favorite' ? 'active' : null }}">
                        <a id="navbar" href="{{ route('favorite') }}" class="nav-link"  role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fas fa-heart"></i> Favorites <span class="caret"></span>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::segment(1) === 'mypost' ? 'active' : null }}">
                        <a id="navbar" class="nav-link" href="{{ url('/mypost') }}" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fas fa-book"></i> My recipes <span class="caret"></span>
                        </a>
                    </li>
                    <!-- notifications dropdown -->
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle" id="notifications" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <span style="font-size: 20px; padding-top: 10px;" class="fas fa-bell"></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="notificationsMenu" id="notificationsMenu">
                            <li class="dropdown-header">No notifications</li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown {{ Request::segment(1) === 'profile' ? 'active' : null }} {{ Request::segment(2) === 'create' ? 'active' : null }}">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="position: relative; padding-left: 50px;">
                            @if (Auth::user()->avatar != 'default.jpg')
                                <img src="{{ Auth::user()->getUsersAvatar() }}" style="width: 32px; height: 32px; position:absolute; top:5px; left:10px; border-radius: 50%;">
                            @else
                                <div style="position:absolute; top:5px; left:10px; border-radius: 50%;">{!! Avatar::create(Auth::user()->name)->setShape('circle')->setDimension(32, 32)->setFontSize(12)->toSvg(); !!}</div>
                            @endif
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('profile') }}">
                                <i class="fas fa-user"></i> Edit profile
                            </a>
                            <a class="dropdown-item" href="{{ route('create') }}">
                                <i class="fas fa-plus"></i> Add a new recipe
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
