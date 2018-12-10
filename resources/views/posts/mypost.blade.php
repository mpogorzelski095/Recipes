@extends('layouts.app')


@section ('content')

    <form method="post" enctype="multipart/form-data" action="{{ route('sortMypost') }}">
        @csrf
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Sort by</label>
            </div>
            <select name="sortMypost" class="custom-select" id="inputGroupSelect01">
                <option href="/?sortMypost=1" value="1" {{ $option == '1'  ? "selected" : "" }} >Latest</option>
                <option href="/?sortMypost=2" value="2" {{ $option == '2'  ? "selected" : "" }} >Oldest</option>
                <option href="/?sortMypost=3" value="3" {{ $option == '3'  ? "selected" : "" }} >Like</option>
                <option href="/?sortMypost=4" value="4" {{ $option == '4'  ? "selected" : "" }} >Comments</option>
            </select>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>




    <div class="col-sm-8 blog-main">


        @if($posts->count() == 0)
            nie masz postów buraku
        @else
            @foreach ($posts as $post)
                <div class="card">
                    <div class="card-body">
                        @include('posts.post')
                        <a href="/posts/{{ $post->id }}/edit">
                            <button type="button" class="btn btn-primary" style="margin-right: 10px; float:left; ">
                                Edit
                            </button>
                        </a>
                        <form action="{{ route('destroy', ['post' => $post]) }}" method="POST">
                            @csrf
                            {{method_field('DELETE')}}
                            <button type="submit" class="btn btn-danger" style="float:left;">Delete</button>
                    </div>

                    </form>
                </div>
                <br>

            @endforeach
        @endif

        <div class="container" style="display: flex; justify-content: center;">


            {{ $posts->links() }}

        </div>


@endsection
