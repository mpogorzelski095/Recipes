@extends('layouts.app')


@section ('content')


    <div class="dropdown show">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown link
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
        </div>
    </div>



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
