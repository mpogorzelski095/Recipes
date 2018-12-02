@extends('layouts.app')


@section ('content')

          <div class="col-sm-8 blog-main">



          @foreach ($posts as $post)
          <div class="card">
            <div class="card-body">
                @include('posts.post')
                <a href="/posts/{{ $post->id }}/edit"><button type="button" class="btn btn-primary" style="margin-right: 10px; float:left; ">Edit</button></a>
                <form action="{{ route('destroy', ['post' => $post]) }}" method="POST">
                @csrf
                {{method_field('DELETE')}}
                <button type="submit" class="btn btn-danger" style="float:left;">Delete</button>
            </div>

            </form>
          </div>
          <br>

          @endforeach
          <div class="container" style="display: flex; justify-content: center;">


                {{ $posts->links() }}

          </div>


@endsection
