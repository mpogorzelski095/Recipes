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
    @if($posts->count() == 0)
        <div class="row justify-content-center">
            <div class="card" id="postsCard">
                <div class="card-body">
                    <p style="text-align: center; font-size: 100px; margin-bottom: 0;"><i class="fas fa-utensils"></i>
                    </p>
                    <p style="text-align: center; font-size: 40px;">No recipes to show </p>
                    <a href="{{ route('community') }}" type="button" class="btn btn-success btn-lg btn-block">Find
                        recipes to like</a>
                </div>
            </div>
        </div>
    @else
        <div class="row justify-content-center">
            <div class="col-sm-10">
                <form method="post" enctype="multipart/form-data" action="{{ route('sortFavorite') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Sort by</label>
                        </div>
                        <select name="sortFavorite" class="custom-select" id="inputGroupSelect01">
                            <option href="/?sortFavorite=1" value="1" {{ $option == '1'  ? "selected" : "" }} >Latest
                            </option>
                            <option href="/?sortFavorite=2" value="2" {{ $option == '2'  ? "selected" : "" }} >Oldest
                            </option>
                            <option href="/?sortFavorite=3" value="3" {{ $option == '3'  ? "selected" : "" }} >Like
                            </option>
                            <option href="/?sortFavorite=4" value="4" {{ $option == '4'  ? "selected" : "" }} >Comments
                            </option>
                        </select>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-sm-10">
                @foreach ($posts as $post)
                    <div class="card" id="postsCard">
                        <div class="card-body">
                            @include('posts.post')
                        </div>
                    </div>
                    <br>
                @endforeach
            </div>
        </div>

        <div class="container" style="display: flex; justify-content: center;">
            {{ $posts->links() }}
        </div>
    @endif
@endsection


