<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
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
                            <li class="nav-item">
                                <a id="navbar" href="{{ route('index') }}" class="nav-link"  role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Strona główna <span class="caret"></span>
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
        <div class="container" style="margin-top:50px;">
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
