<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="shortcut icon" href="{{ asset('ico.png') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MyRecipes</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,900&amp;subset=latin-ext" rel="stylesheet">

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
        @include('layouts.nav')
        <div class="container" id="main-container">
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
