<div class="blog-post post" data-postid="{{$post->id}}">
    <h2 class="blog-post-title">
        <a href="/posts/{{ $post->id }}">
            {{ $post->title }}
        </a>
    </h2>
    <p class="blog-post-meta">

        <a href="/users/{{ $post->user->id }}">
            {{ $post->user->name }}

        </a>
        {{ $post->created_at->toFormattedDateString() }}
    </p>
    <p>
        <img src="{{ $post->getFoodPic() }}" style="width: 150px; height: 150px; float: left; border-radius: 50%;">

    {{--{{ str_limit($post->user->name, $limit = 2, $end = '...') }} keep ridingS--}}


        {{ str_limit($post->body, $limit = 500, $end = '...') }}  <a href="/posts/{{ $post->id }}">keep riding
        </a>
        {{--@if ($post->body != "")--}}
            {{--@foreach(explode(',', $post->body) as $info)--}}
                {{--<li>{{$info}}</li>--}}
    {{--@endforeach--}}
    {{--@endif--}}

       <p>Likes:</p>{{ $post->likes()->count() }}

    </p>
    <div>
        @if (Auth::user() != false)
            {{--dopisać ilość lajków--}}
            <div class="interaction">
                <a href="#" class="btn btn-xs btn-warning like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1 ? 'You like this post' : 'Like' : 'Like'  }}</a>
            </div>
        @else

        @endif
    </div>
</div>
