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


    <form method="post" enctype="multipart/form-data" action="{{ route('sortFollowUserPost') }}">
        @csrf
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Sort by</label>
            </div>
            <select name="sortFollowUserPost" class="custom-select" id="inputGroupSelect01">
                <option href="/?sortFollowUserPost=1" value="1" {{ $option == '1'  ? "selected" : "" }} >Latest</option>
                <option href="/?sortFollowUserPost=2" value="2" {{ $option == '2'  ? "selected" : "" }} >Oldest</option>
                <option href="/?sortFollowUserPost=3" value="3" {{ $option == '3'  ? "selected" : "" }} >Like</option>
                <option href="/?sortFollowUserPost=4" value="4" {{ $option == '4'  ? "selected" : "" }} >Comments</option>
            </select>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>




    @if($posts->count() == 0)
        nie śledzisz nikogo śledziu
    @else
        <div class="col-sm-8 blog-main">

            <div class="row justify-content-center">
                <div class="col-sm-8">
                    @foreach ($posts as $post)
                        <div class="card">
                            <div class="card-body">
                                @include('posts.post')
                            </div>
                        </div>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>

    @endif






    <div class="container" style="display: flex; justify-content: center;">


        {{ $posts->links() }}

    </div>


@endsection







