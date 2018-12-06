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

  <form method="post" enctype="multipart/form-data" action="/posts">
    @csrf
    <div class="form-group">
      <label for="Title">Title</label>
      <input type="text" class="form-control" id="title" name="title" >
    </div>
      <div class="form-group">
          <label for="exampleSelect1">Kategoria</label>
          <select name="category" class="form-control">
              @foreach($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
          </select>
      </div>
      <label>Update Profile Image</label>
      <input type="file" name="foodPic">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">


          {{--<div class="form-group">--}}
              {{--<label for="exampleFormControlFile1">Image</label>--}}
              {{--<input name="foodPic" type="file" class="form-control-file" id="exampleFormControlFile1">--}}
              {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
          {{--</div>--}}




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
