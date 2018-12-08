@extends('layouts.app')


@section ('content')

    <form method="post" enctype="multipart/form-data" action="/sort">
        @csrf

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Options</label>
            </div>
            <select class="custom-select" id="inputGroupSelect01">
                <option selected>Choose...</option>
                <option value="1">Latest</option>
                <option value="2">Oldest</option>
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
            <div class="card" style="width: 21rem;">
                <img class="card-img-top" src="https://i.imgur.com/MmLmgYf.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card" style="width: 21rem;">
                <img class="card-img-top" src="https://i.imgur.com/MmLmgYf.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card" style="width: 21rem;">
                <img class="card-img-top" src="https://i.imgur.com/MmLmgYf.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-sm-4">
            {{ $posts->links() }}
        </div>
    </div>

@endsection
