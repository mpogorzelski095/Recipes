<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token()
        ]); ?>
    </script>

    <!-- This makes the current user's id available in javascript -->
    @if(!auth()->guest())
        <script>
            window.Laravel.userId = <?php echo auth()->user()->id; ?>
        </script>
    @endif

<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


</head>
<body>
    <div id="app">
        <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark">
        {{--<nav class="navbar navbar-expand-md navbar-light navbar-laravel">--}}
            <div class="container">
                <a class="navbar-brand" href="{{ url('/followUserPost') }}">
                    <!-- {{ config('app.name', 'Laravel') }} -->
                    <strong>MOJE PRZEPISY</strong>
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
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            {{--<li class="dropdown">--}}
                                {{--<a class="dropdown-toggle" id="notifications" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">--}}
                                    {{--<span class="glyphicon glyphicon-user"></span>--}}
                                {{--</a>--}}
                                {{--<ul class="dropdown-menu" aria-labelledby="notificationsMenu" id="notificationsMenu">--}}
                                    {{--<li class="dropdown-header">No notifications</li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                            <li class="nav-item">
                                <a id="navbar" href="{{ route('followUserPost') }}" class="nav-link"  role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Home <span class="caret"></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a id="navbar" href="{{ route('community') }}" class="nav-link"  role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Community <span class="caret"></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a id="navbar" href="{{ route('categories') }}" class="nav-link"  role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Kategorie <span class="caret"></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a id="navbar" href="{{ route('favorite') }}" class="nav-link"  role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Ulubione <span class="caret"></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a id="navbar" class="nav-link" href="{{ url('/mypost') }}" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Moje przepisy <span class="caret"></span>
                                </a>
                            </li>
                            <!-- notifications dropdown -->
                            <li class="dropdown">
                                <a class="dropdown-toggle" id="notifications" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <span style="font-size: 20px; padding-top: 10px;" class="fas fa-bell"></span>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="notificationsMenu" id="notificationsMenu">
                                    <li class="dropdown-header">No notifications</li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="position: relative; padding-left: 50px;">


                                    @if (Auth::user()->avatar != 'default.jpg')
                                        <img src="{{ Auth::user()->getUsersAvatar() }}" style="width: 32px; height: 32px; position:absolute; top:5px; left:10px; border-radius: 50%;">
                                    @else
                                        <div style="position:absolute; top:5px; left:10px; border-radius: 50%;">{!! Avatar::create(Auth::user()->name)->setDimension(32, 32)->setFontSize(12)->toSvg(); !!}</div>
                                    @endif

                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{ route('profile') }}">
                                      {{ __('Profile') }}
                                  </a>
                                  <a class="dropdown-item" href="{{ route('create') }}">
                                      {{ __('Create post') }}
                                  </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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
        <div class="container" style="margin-top:100px;">
            {{--display: flex; justify-content: center;--}}


                {{--@if ($flash = session('message'))--}}
                    {{--<div id="flash-message" class="alert alert-success" role="alert">--}}
                        {{--{{ $flash }}--}}
                    {{--</div>--}}
                {{--@endif--}}

                @yield('content')

        </div>

    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <script src="{{ asset('/js/like.js') }}"></script>
    <script src="{{ asset('/js/follow.js') }}"></script>
    <script>
        var token = '{{ Session::token() }}';
        var urlLike = '{{ route('toggle_like') }}';
        var urlFollow = '{{ route('toggle_follow') }}';
    </script>
    <script>
        $(function () {
            $("#sort2").on("changed.bs.select", function(e, clickedIndex, newValue, oldValue) {
                var selectedD = $(this).find('option').eq(clickedIndex).text();
                console.log('selectedD: ' + selectedD + '  newValue: ' + newValue + ' oldValue: ' + oldValue);
            });
        });
    </script>
</body>
</html>
