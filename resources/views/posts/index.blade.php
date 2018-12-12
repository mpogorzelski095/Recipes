@extends('layouts.app')


@section ('content')



    <div class="row" id="food">
        <div class="col-sm-6 col-md-12 col-lg-4">
            <a href="/posts/{{ $like->id }}">
                <div id="foodCard" class="card">
                    <img class="img-fluid food" src="{{ $like->getFoodPic() }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 style="font-weight: bold;" class="card-title">The most-liked recipe: &nbsp;<span
                                style="font-size: 17px;"
                                class="badge badge-success">{{ $like->likes()->count() }}</span>
                        </h5>
                        <h5 class="card-title">{{ str_limit($like->title, $limit = 50, $end = '...') }}</h5>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-sm-6 col-md-6 col-lg-4">
            <a href="/posts/{{ $comment->id }}">
                <div id="foodCard" class="card">
                    <img class="img-fluid food" src="{{ $comment->getFoodPic() }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 style="font-weight: bold;" class="card-title">The most commented recipe: &nbsp;<span
                                style="font-size: 17px;"
                                class="badge badge-success">{{ $comment->comments()->count() }}</span></h5>
                        <h5 class="card-title">{{ str_limit($comment->title, $limit = 50, $end = '...') }}</h5>
                    </div>
                </div>
            </a>
        </div>

        {{--<p class="card-text"> {{ str_limit($comment->body, $limit = 100, $end = '...') }}  <a href="/posts/{{ $comment->id }}">keep riding</p>--}}

        <div class="col-sm-6 col-md-6 col-lg-4">
            <a href="/users/{{ $follow->id }}">
                <div id="foodCard" class="card">
                    @if ($follow->avatar != 'default.jpg')
                        <img class="img-fluid food" src="{{ $follow->getUsersAvatar() }}" alt="Card image cap">
                    @else
                        {!! Avatar::create($follow->name)->setShape('square')->setDimension(350, 300)->setfontSize(150)->toSvg(); !!}
                    @endif
                    <div class="card-body">
                        <h5 style="font-weight: bold;" class="card-title">The most followed user: &nbsp;<span
                                style="font-size: 17px;"
                                class="badge badge-success">{{ $follow->followers()->count() }}</span></h5>
                        <h5 class="card-title">{{ $follow->name }}</h5>
                    </div>
                </div>
            </a>
        </div>

    </div>
    <br>


    <div class="row">
        <div class="col-sm-4">
            <form method="post" enctype="multipart/form-data" action="{{ route('sortCommunity') }}">
                @csrf
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Sort by</label>
                    </div>
                    <select name="sortCommunity" class="custom-select" id="inputGroupSelect01">
                        <option href="/?sortCommunity=1" value="1" {{ $option == '1'  ? "selected" : "" }} >Latest
                        </option>
                        <option href="/?sortCommunity=2" value="2" {{ $option == '2'  ? "selected" : "" }} >Oldest
                        </option>
                        <option href="/?sortCommunity=3" value="3" {{ $option == '3'  ? "selected" : "" }} >Like
                        </option>
                        <option href="/?sortCommunity=4" value="4" {{ $option == '4'  ? "selected" : "" }} >Comments
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
                <div class="card">
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
