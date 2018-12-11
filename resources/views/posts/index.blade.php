@extends('layouts.app')


@section ('content')



    <div class="row justify-content-center" id="food">
        <div class="col-sm-4">
            <div class="card" style="width: 21rem;">
                <img class="food" src="{{ $like->getFoodPic() }}" alt="Card image cap">
                <div class="card-body">
                    <h5 style="font-weight: bold;" class="card-title">The largest number of likes: &nbsp;<span
                            style="font-size: 17px;" class="badge badge-success">{{ $like->likes()->count() }}</span>
                    </h5>
                    <h5 class="card-title">{{ str_limit($like->title, $limit = 50, $end = '...') }}</h5>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card" style="width: 21rem;">
                <img class="food" src="{{ $comment->getFoodPic() }}" alt="Card image cap">
                <div class="card-body">
                    <h5 style="font-weight: bold;" class="card-title">The most commented recipe: &nbsp;<span
                            style="font-size: 17px;"
                            class="badge badge-success">{{ $comment->comments()->count() }}</span></h5>
                    <h5 class="card-title">{{ str_limit($comment->title, $limit = 50, $end = '...') }}</h5>
                </div>
            </div>
        </div>

        {{--<p class="card-text"> {{ str_limit($comment->body, $limit = 100, $end = '...') }}  <a href="/posts/{{ $comment->id }}">keep riding</p>--}}

        <div class="col-sm-4">
            <div class="card" style="width: 21rem;">
                @if ($follow->avatar != 'default.jpg')
                    <img class="card-img-top" src="{{ $follow->getUsersAvatar() }}" alt="Card image cap" width="300px"
                         height="300px">
                @else
                    {!! Avatar::create($follow->name)->setShape('square')->setDimension(335, 300)->setfontSize(150)->toSvg(); !!}
                @endif
                <div class="card-body">
                    <h5 style="font-weight: bold;" class="card-title">The most followed user: &nbsp;<span
                            style="font-size: 17px;"
                            class="badge badge-success">{{ $follow->followers()->count() }}</span></h5>
                    <h5 class="card-title">{{ $follow->name }}</h5>
                </div>
            </div>
        </div>

    </div>
    <br>


    <div class="row justify-content-center">
        <div class="col-sm-6">
            <form method="post" enctype="multipart/form-data" action="{{ route('sortCommunity') }}">
                @csrf
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Sort by</label>
                    </div>
                    <select name="sortCommunity" class="custom-select" id="inputGroupSelect01">
                        <option href="/?sortCommunity=1" value="1" {{ $option == '1'  ? "selected" : "" }} >Latest</option>
                        <option href="/?sortCommunity=2" value="2" {{ $option == '2'  ? "selected" : "" }} >Oldest</option>
                        <option href="/?sortCommunity=3" value="3" {{ $option == '3'  ? "selected" : "" }} >Like</option>
                        <option href="/?sortCommunity=4" value="4" {{ $option == '4'  ? "selected" : "" }} >Comments</option>
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

    <div class="row justify-content-center">
        <div class="col-sm-4">
            {{ $posts->links() }}
        </div>
    </div>

@endsection
