<div class="row">

    <div class="col-sm-4">
        <img class="rounded" src="{{ $post->getFoodPic() }}" id="foodPic">
    </div>


    <div class="col-sm-8">
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
                {{--{{ $post->created_at->toFormattedDateString() }}--}}
                {{ $post->created_at->toDayDateTimeString() }}
            </p>
            <p>
                {{--{{ str_limit($post->user->name, $limit = 2, $end = '...') }} keep ridingS--}}
                {{ str_limit($post->body, $limit = 350, $end = '...') }} <a href="/posts/{{ $post->id }}">keep riding
                </a>
            {{--@if ($post->body != "")--}}
            {{--@foreach(explode(',', $post->body) as $info)--}}
            {{--<li>{{$info}}</li>--}}
            {{--@endforeach--}}
            {{--@endif--}}


            <p><span style="font-weight: bold;" id="likes-count-{{$post->id}}">{{ $post->likes()->count() }}</span>
                <span style="font-weight: bold;">likes & </span>
                <span style="font-weight: bold;">{{ $post->comments()->count() }} comments</span>
                <span style="float: right;">
                    @if (Auth::user() != false)
                        @php $likes = $post->likes()->where('user_id', auth()->id())->first() @endphp
                        <a href="#" class="btn {{$likes ? 'btn-danger' : 'btn-success'}} like-btn" role="button"
                           data-postid="{{$post->id}}">{{$likes ? "DisLike" : 'Like'}}</a>
                    @else

                    @endif
        </span></p>
            </p>
        </div>
    </div>
</div>







