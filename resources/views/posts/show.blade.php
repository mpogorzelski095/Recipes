@extends('layouts.app')

@section ('content')
  <div class="col-sm-8 blog-main">

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

    <div class="card">
      <div class="card-header">
        <h1> {{ $post->title }} </h1>
        {{ $post->user->name }}
        {{ $post->created_at->toFormattedDateString() }}
        </div>
      <div class="card-body">

                {{ $post->body }}

      </div>

    </div>

    <br>

        <h3>Comment section </h3>
        <hr>
        <div class="comments">
          <ul class="list-group">

            @foreach ($post->comments as $comment)
                <li class="list-group-item" style="padding-top: 20px; padding-bottom: 5px;">

                    @if ($comment->user->avatar != 'default.jpg')
                        <img src="{{ $comment->user->getUsersAvatar() }}" style="width: 32px; height: 32px;  border-radius: 50%;">
                    @else
                        <div style="float:left; border-radius: 50%;">{!! Avatar::create($comment->user->name)->setDimension(32, 32)->setFontSize(12)->toSvg(); !!}</div>
                    @endif


                <strong style="padding-left: 5px;">{{ $comment->user->name }} {{ $comment->created_at->diffForHumans()}}</strong>:<br>
                <p style="padding-left: 40px;">{{ $comment->body }}</p>
                </li>
            @endforeach
          </ul>
        </div>




        <hr>
        <form method="POST" action="/posts/{{ $post->id }}/comments">
          {{ csrf_field() }}
          <div class="form-row">

            <div class="form-group col-md-12">
              <strong><label for="exampleFormControlTextarea1">Add your comment </label></strong>
              <textarea class="form-control" name="body" placeholder="Your comment here." rows="3"></textarea>
            </div>
          </div>

          <button type="submit" class="btn btn-primary">Add comment</button>
        </form>
        <br><br><br>

  </div>
@endsection
