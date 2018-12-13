@extends('layouts.app')

@section ('content')
    @if (count($errors))
        <div class="form-group">
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <img class="rounded" src="{{ $post->getFoodPic() }}" id="foodPicInShow">
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-sm-10">
            <div class="card" id="postsCard">
                <div class="card-header">
                    <h1 id="showPosth1"> {{ $post->title }} </h1>
                    <a href="/users/{{ $post->user->id }}">
                        {{ $post->user->name }}
                    </a>
                    {{ $post->created_at->toFormattedDateString() }}
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <h2 id="showPosth2">Ingredients</h2>
                            <table class="table table-striped">
                                <tbody>
                                @if ($post->ingredients != "")
                                    @foreach(explode(',', $post->ingredients) as $info)
                                        <tr>
                                            <td>{{$info}}</td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="col-sm-8" style="text-align: justify;">
                            <h2 id="showPosth2">Description</h2>
                            {{ $post->body }}
                            <p style="margin: 0px;"><span style="font-weight: bold;"
                                                          id="likes-count-{{$post->id}}">{{ $post->likes()->count() }}</span>
                                <span style="font-weight: bold;">likes & </span>
                                <span style="font-weight: bold;">{{ $post->comments()->count() }} comments</span>
                            </p>


                        </div>

                        <div id="LikeBtnshowPost" class="d-flex justify-content-end">
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
    </div>
    <br>


    <div class="row justify-content-center">
        <div class="col-sm-10">
            <h3>Comment section </h3>
            <hr>
            <div class="comments">
                <ul class="list-group">

                    @foreach ($comments as $comment)
                        <li class="list-group-item" style="padding-top: 20px; padding-bottom: 5px;">

                            @if ($comment->user->avatar != 'default.jpg')
                                <img src="{{ $comment->user->getUsersAvatar() }}"
                                     style="width: 32px; height: 32px;  border-radius: 50%;">
                            @else
                                <div
                                    style="float:left; border-radius: 50%;">{!! Avatar::create($comment->user->name)->setDimension(32, 32)->setFontSize(12)->toSvg(); !!}</div>
                            @endif


                            <strong style="padding-left: 5px;"> <a href="/users/{{ $comment->user->id }}">
                                    {{ $comment->user->name }}
                                </a> {{ $comment->created_at->diffForHumans() }}</strong>:<br>
                            <p style="padding-left: 40px;">{{ $comment->body }}</p>
                        </li>
                    @endforeach
                </ul>
            </div>

            <form method="POST" action="/posts/{{ $post->id }}/comments">
                {{ csrf_field() }}
                <div class="form-row">

                    <div class="form-group col-md-12">
                        <label id="commentForm" for="exampleFormControlTextarea1">Add your comment </label>
                        <textarea class="form-control" name="body" placeholder="Your comment here." rows="3"></textarea>
                    </div>
                </div>
                <div class="d-flex justify-content-end" style="padding-bottom: 20px">
                    <button type="submit" class="btn btn-primary">Add comment</button>
                </div>
            </form>

        </div>
    </div>

@endsection
