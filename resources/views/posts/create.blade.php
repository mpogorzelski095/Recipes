@extends('layouts.app')

@section ('content')

    <div class="row justify-content-center">
        <div class="col-sm-8">
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
            <h1>Add a new recipe:</h1>
            <hr>
            <form method="post" enctype="multipart/form-data" action="/posts" style="padding-bottom: 40px;">
                @csrf
                <div class="form-group">
                    <label for="Title">Title:</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>

                <div class="form-group">
                    <label for="exampleSelect1">Choose categories:</label>
                    <select name="category" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                {{--<div class="form-group">--}}
                {{--<label for="exampleFormControlFile1">Image</label>--}}
                {{--<input name="foodPic" type="file" class="form-control-file" id="exampleFormControlFile1">--}}
                {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                {{--</div>--}}
                <div class="form-group">
                    <label for="body">Description:</label>
                    <textarea id="body" name="body" placeholder="How did you prepare this dish?" class="form-control" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="ingredients">Ingredients:</label>
                    <textarea id="ingredients" placeholder="Please enter the ingredients after the comma like here: salt, 1 small red onion, 1/2 teaspoon black pepper" name="ingredients" class="form-control" rows="3"></textarea>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Add a photo:</label><br>
                            <input type="file" name="foodPic">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex justify-content-end" id="SubBtn">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Add a recipe</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>




@endsection





