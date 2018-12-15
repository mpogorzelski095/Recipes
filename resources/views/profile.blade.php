@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header"><h3>{{ $user->name }} profile:</h3></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            @if ($user->avatar != 'default.jpg')

                                <img class="img-fluid food" src="{{ $user->getUsersAvatar() }}"
                                     style="width: 230px; height: 230px; float: left; border-radius: 50%;">
                            @else
                                {!! Avatar::create($user->name)->setDimension(230, 230)->setFontSize(100)->toSvg(); !!}
                            @endif

                        </div>
                        <div class="col-sm-6">
                            <strong>Full name:</strong> <br>{{ $user->name }} <br>
                            <strong>E-mail:</strong> <br>{{ $user->email }} <br>
                            <hr>
                            <form enctype="multipart/form-data" action="/profile" method="POST">
                                <label style="font-weight: bold;">Edit profile photo</label>
                                <input type="file" name="avatar">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="d-flex justify-content-end" style="padding-top: 10px;">
                                    <input type="submit" class="btn btn-success">
                                </div>

                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>




    {{--<div class="card">--}}
    {{--<div class="card-header">{{ $user->name }} profile</div>--}}
    {{--<div class="card-body">--}}
    {{--@if ($user->avatar != 'default.jpg')--}}
    {{--<img src="{{ $user->getUsersAvatar() }}" style="width: 150px; height: 150px; float: left; border-radius: 50%;">--}}
    {{--@else--}}
    {{--{!! Avatar::create($user->name)->setDimension(150, 150)->toSvg(); !!}--}}
    {{--@endif--}}

    {{--<form enctype="multipart/form-data" action="/profile" method="POST">--}}
    {{--<label>Update Profile Image</label>--}}
    {{--<input type="file" name="avatar">--}}
    {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
    {{--<input type="submit" class="btn-success">--}}
    {{--</form>--}}
    {{--<br><br>--}}
    {{--<strong>Name:</strong> {{ $user->name }} <br>--}}
    {{--<strong>Email:</strong> {{ $user->email }}--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
@endsection











{{--Material design--}}
{{--<div class="row">--}}
{{--<div class="col s4">--}}
{{--<div class="card blue-grey darken-1">--}}
{{--<div class="card-content white-text">--}}
{{--<span class="card-title">Card Title</span>--}}
{{--<p>I am a very simple card. I am good at containing small bits of information.--}}
{{--I am convenient because I require little markup to use effectively.</p>--}}
{{--</div>--}}
{{--<div class="card-action">--}}
{{--<a href="#">This is a link</a>--}}
{{--<a href="#">This is a link</a>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="col s4">--}}
{{--<div class="card blue-grey darken-1">--}}
{{--<div class="card-content white-text">--}}
{{--<span class="card-title">Card Title</span>--}}
{{--<p>I am a very simple card. I am good at containing small bits of information.--}}
{{--I am convenient because I require little markup to use effectively.</p>--}}
{{--</div>--}}
{{--<div class="card-action">--}}
{{--<a href="#">This is a link</a>--}}
{{--<a href="#">This is a link</a>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="col s4">--}}
{{--<div class="card blue-grey darken-1">--}}
{{--<div class="card-content white-text">--}}
{{--<span class="card-title">Card Title</span>--}}
{{--<p>I am a very simple card. I am good at containing small bits of information.--}}
{{--I am convenient because I require little markup to use effectively.</p>--}}
{{--</div>--}}
{{--<div class="card-action">--}}
{{--<a href="#">This is a link</a>--}}
{{--<a href="#">This is a link</a>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="container">--}}
{{--<div class="col s12 m7">--}}
{{--<h2 class="header">{{ $user->name }} profile</h2>--}}
{{--<div class="card horizontal">--}}
{{--<div class="card-image">--}}
{{--@if ($user->avatar != 'default.jpg')--}}
{{--<img src="{{ $user->getUsersAvatar() }}" style="width: 150px; height: 150px; float: left; border-radius: 50%;">--}}
{{--@else--}}
{{--{!! Avatar::create($user->name)->setDimension(150, 150)->toSvg(); !!}--}}
{{--@endif--}}
{{--</div>--}}
{{--<div class="card-stacked">--}}
{{--<div class="card-content">--}}
{{--<form enctype="multipart/form-data" action="/profile" method="POST">--}}
{{--<label>Update Profile Image</label>--}}
{{--<input type="file" name="avatar">--}}
{{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
{{--<input type="submit" class="btn-success">--}}
{{--</form>--}}
{{--<br><br>--}}
{{--<strong>Name:</strong> {{ $user->name }} <br>--}}
{{--<strong>Email:</strong> {{ $user->email }}--}}
{{--</div>--}}
{{--<div class="card-action">--}}
{{--<a href="#">This is a link</a>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
