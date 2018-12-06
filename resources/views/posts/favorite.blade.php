{{--<div class="blog-post post" data-postid="{{$post->id}}">--}}
    {{--<h2 class="blog-post-title">--}}
        {{--<a href="/posts/{{ $post->id }}">--}}
            {{--{{ $post->title }}--}}
        {{--</a>--}}
    {{--</h2>--}}
    {{--<p class="blog-post-meta">--}}

        {{--<a href="/users/{{ $post->user->id }}">--}}
            {{--{{ $post->user->name }}--}}
        {{--</a>--}}
        {{--{{ $post->created_at->toFormattedDateString() }}--}}
    {{--</p>--}}
    {{--<p>--}}
        {{--<img src="{{ $post->getFoodPic() }}" style="width: 150px; height: 150px; float: left; border-radius: 50%;">--}}
        {{--{{ $post->body }}--}}
       {{--<p>Likes:</p>{{ $post->likes()->count() }}--}}

    {{--</p>--}}
    {{--<div>--}}
        {{--@if (Auth::user() != false)--}}
            {{--dopisać ilość lajków--}}
            {{--<div class="interaction">--}}
                {{--<a href="#" class="btn btn-xs btn-warning like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1 ? 'You like this post' : 'Like' : 'Like'  }}</a>--}}
            {{--</div>--}}
        {{--@else--}}

        {{--@endif--}}

    {{--</div>--}}
{{--</div>--}}



@extends('layouts.app')


@section ('content')

    <div class="col-sm-8 blog-main">



        @foreach ($posts as $post)
            <div class="card">
                <div class="card-body">
                    @include('posts.post')
                    <a href="/posts/{{ $post->id }}/edit"><button type="button" class="btn btn-primary" style="margin-right: 10px; float:left; ">Edit</button></a>
                    <form action="{{ route('destroy', ['post' => $post]) }}" method="POST">
                        @csrf
                        {{method_field('DELETE')}}
                        <button type="submit" class="btn btn-danger" style="float:left;">Delete</button>
                </div>

                </form>
            </div>
            <br>

        @endforeach
        <div class="container" style="display: flex; justify-content: center;">


            {{ $posts->links() }}

        </div>


@endsection
