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
    <div class="row" id="category">
        @foreach($categories as $category)
            <div class="col-sm-6 col-md-3 col-lg-3">
                <a href="/categories/{{ $category->name }}">
                    <div id="categoryCard" class="card">
                        <img class="img-fluid category" src="https://i.imgur.com/fz66Jgw.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h3 style="font-weight: bold;" class="card-title">{{ $category->name }} &nbsp;<span
                                    style="font-size: 17px;"
                                    class="badge badge-success">{{ $category->posts->count() }}</span></h3>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
