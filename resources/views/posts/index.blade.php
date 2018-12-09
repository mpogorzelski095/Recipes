@extends('layouts.app')


@section ('content')



    <div class="row justify-content-center">
        <div class="col-sm-4">
            <div class="card" style="width: 21rem;">
                <img class="card-img-top" src="{{ $like->getFoodPic() }}" alt="Card image cap" width="300px" height="300px">
                <div class="card-body">
                    <h5 class="card-title">Największa ilość lajków :v</h5>
                    Liczba lajków  <span>{{ $like->likes()->count() }}</span> <br> <br>
                    <h5 class="card-title">{{ $like->title }}</h5>
                    <p class="card-text"> {{ str_limit($like->body, $limit = 100, $end = '...') }}  <a href="/posts/{{ $like->id }}">keep riding</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card" style="width: 21rem;">
                <img class="card-img-top" src="{{ $comment->getFoodPic() }}" alt="Card image cap" width="300px" height="300px">
                <div class="card-body">
                    <h5 class="card-title">Największa ilość komentarzy :v</h5>
                    Liczba komentarzy  <span>{{ $comment->comments()->count() }}</span> <br> <br>
                    <h5 class="card-title">{{ $comment->title }}</h5>
                    <p class="card-text"> {{ str_limit($comment->body, $limit = 100, $end = '...') }}  <a href="/posts/{{ $comment->id }}">keep riding</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card" style="width: 21rem;">
                @if ($follow->avatar != 'default.jpg')
                    <img class="card-img-top" src="{{ $follow->getUsersAvatar() }}" alt="Card image cap" width="300px" height="300px">
                @else
                    {!! Avatar::create($follow->name)->setShape('square')->setDimension(335, 300)->setfontSize(150)->toSvg(); !!}
                @endif
                <div class="card-body">
                    <h5 class="card-title">Największa ilość followersóffffffff :v</h5>
                    Liczba folowersófffff  <span>{{ $follow->followers()->count() }}</span> <br> <br>
                    <h5 class="card-title">{{ $follow->name }}</h5>
                    <p class="card-text">  <strong>Email:</strong> {{ $follow->email }}</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
    <br>











    <form method="post" enctype="multipart/form-data" action="{{ route('sort') }}">
        @csrf

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Sort by</label>
            </div>
            <select name="sort" class="custom-select" id="inputGroupSelect01">
                <option href="/?sort=1" value="1">Latest</option>
                <option href="/?sort=2" value="2">Oldest</option>
                <option href="/?sort=3" value="3">Like</option>
                <option href="/?sort=4" value="4">Comments</option>
            </select>
        </div>




        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>



    <div class="row justify-content-center">
        <div class="col-sm-8">
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
