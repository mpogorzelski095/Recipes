@extends('layouts.app')

@section ('content')
    <div class="blog-post">
        <h2>Tags</h2>
        <ol class="list-unstyled">
            @foreach($tags as $tag)
                <li>
                    <a href="/tags/{{ $tag }}">
                        {{ $tag }}
                    </a>
                </li>
            @endforeach
        </ol>
    </div>
@endsection
