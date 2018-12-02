@extends('layouts.app')


@section ('content')

          <div class="col-sm-8 blog-main">



          @foreach ($posts as $post)
          <div class="card">
            <div class="card-body">
                @include('posts.post')
            </div>
          </div>
          <br>
          @endforeach
          <div class="container" style="display: flex; justify-content: center;">


                {{ $posts->links() }}

          </div>


@endsection
