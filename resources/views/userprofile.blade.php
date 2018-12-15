@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header"><h3>{{ $user->name }} profile:</h3></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-5">
                            @if ($user->avatar != 'default.jpg')
                                <img class="img-fluid food" src="{{ $user->getUsersAvatar() }}"
                                     style="width: 230px; height: 230px; float: left; border-radius: 50%;">
                            @else
                                {!! Avatar::create($user->name)->setDimension(230, 230)->setFontSize(100)->toSvg(); !!}
                            @endif
                        </div>
                        <div class="col-sm-7">
                            <strong>Full name:</strong> <br>{{ $user->name }} <br>
                            <strong>E-mail:</strong> <br>{{ $user->email }} <br>
                            <hr>
                            @if (auth()->user()->isFollowing($user->id))
                                <td>
                                    <form action="{{route('unfollow', ['id' => $user->id])}}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" id="delete-follow-{{ $user->id }}" class="btn btn-danger">
                                            <i class="fa fa-btn fa-trash"></i>Unfollow
                                        </button>
                                    </form>
                                </td>
                            @else
                                <td>
                                    <form action="{{route('follow', ['id' => $user->id])}}" method="POST">
                                        {{ csrf_field() }}

                                        <button type="submit" id="follow-user-{{ $user->id }}" class="btn btn-primary">
                                            <i class="fa fa-btn fa-user"></i>Follow
                                        </button>
                                    </form>
                                </td>
                            @endif
                            <strong>A number of followers: <span id="followers-count">{{ $followers->count() }}</span></strong> <br> <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<br>

    <div class="row justify-content-center">
        <div class="col-sm-10">
            @foreach ($posts as $post)
                <div class="card" id="postsCard">
                    <div class="card-body">


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
                                        {{ str_limit($post->body, $limit = 350, $end = '...') }} <a
                                            href="/posts/{{ $post->id }}">keep riding
                                        </a>
                                    {{--@if ($post->body != "")--}}
                                    {{--@foreach(explode(',', $post->body) as $info)--}}
                                    {{--<li>{{$info}}</li>--}}
                                    {{--@endforeach--}}
                                    {{--@endif--}}

                                    <p style="margin: 0px;"><span style="font-weight: bold;"
                                                                  id="likes-count-{{$post->id}}">{{ $post->likes()->count() }}</span>
                                        <span style="font-weight: bold;">likes & </span>
                                        <span style="font-weight: bold;">{{ $post->comments()->count() }}
                                            comments</span>
                                    </p>
                                </div>
                                <div id="LikeBtn" class="d-flex justify-content-end">
                                    @if (Auth::user() != false)
                                        @php $likes = $post->likes()->where('user_id', auth()->id())->first() @endphp
                                        <a href="#" class="btn {{$likes ? 'btn-danger' : 'btn-success'}} like-btn"
                                           role="button"
                                           data-postid="{{$post->id}}">{{$likes ? "Dislike" : 'Like'}}</a>
                                    @else
                                    @endif
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <br>
            @endforeach
        </div>
    </div>










@endsection
