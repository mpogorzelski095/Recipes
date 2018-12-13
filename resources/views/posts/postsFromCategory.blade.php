@extends('layouts.app')


@section ('content')
    {{--<form method="post" enctype="multipart/form-data" action="{{ route('sort3') }}">--}}
        {{--@csrf--}}
        {{--<div class="input-group mb-3">--}}
            {{--<div class="input-group-prepend">--}}
                {{--<label class="input-group-text" for="inputGroupSelect01">Sort by</label>--}}
            {{--</div>--}}
            {{--<select name="sort3" class="custom-select" id="inputGroupSelect01">--}}
                {{--<option href="/?sort3=1" value="1">Latest</option>--}}
                {{--<option href="/?sort3=2" value="2">Oldest</option>--}}
                {{--<option href="/?sort3=3" value="3">Like</option>--}}
                {{--<option href="/?sort3=4" value="4">Comments</option>--}}
            {{--</select>--}}
        {{--</div>--}}
        {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
        {{--<div class="form-group">--}}
            {{--<button type="submit" class="btn btn-primary">Submit</button>--}}
        {{--</div>--}}
    {{--</form>--}}

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

    <div class="d-flex justify-content-end">
        {{ $posts->links() }}
    </div>

@endsection

