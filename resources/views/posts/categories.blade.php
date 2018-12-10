@extends('layouts.app')

{{--@section ('content')--}}
    {{--<div class="blog-post">--}}
        {{--<h2>Tags</h2>--}}
        {{--<ol class="list-unstyled">--}}
            {{--@foreach($categories as $category)--}}
                {{--<li>--}}
                    {{--<a href="/categories/{{ $category->name }}">--}}
                        {{--{{ $category->name }}--}}
                        {{--{{ $category->posts->count() }}--}}
                    {{--</a>--}}
                {{--</li>--}}
            {{--@endforeach--}}
        {{--</ol>--}}
    {{--</div>--}}
{{--@endsection--}}

@section ('content')
    <h2>Categories</h2>
    <div class="row">






    @foreach($categories as $category)
        <div class="col-4" style="padding-bottom: 20px;">
            <a href="/categories/{{ $category->name }}">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="https://i.imgur.com/uAiZZrm.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">{{ $category->name }} {{ $category->posts->count() }}</p>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
    </div>
@endsection
