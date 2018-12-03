@extends('layouts.app')

@section ('content')
<div class="col-sm-8 blog-main">
  <h1>Create a post</h1>
  <hr>

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

  <form method="post" action="/posts">
    @csrf
    <div class="form-group">
      <label for="Title">Title</label>
      <input type="text" class="form-control" id="title" name="title" >
    </div>
    <div class="form-group">
      <label for="body">Body</label>
      <textarea id="body" name="body" class="form-control" rows="3" ></textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>

</div>
@endsection
