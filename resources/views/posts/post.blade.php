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
    </p>
    <div>
        @if (Auth::user() != false)

            @php $likes = $post->likes()->where('user_id', auth()->id())->first() @endphp
            <a href="#" class="btn {{$likes ? 'btn-danger' : 'btn-success'}} like-btn" role="button" data-postid="{{$post->id}}">{{$likes ? 'DisLike' : 'Like'}}</a>
            <br><br>
            Liczba lajków  <span id="likes-count-{{$post->id}}">{{ $post->likes()->count() }}</span> <br> <br>
        @else

        @endif
    </div>
</div>
