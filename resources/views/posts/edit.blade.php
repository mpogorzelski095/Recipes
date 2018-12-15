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
            <h1>Edit recipe:</h1>
            <hr>
            <form method="post" action="/posts/{{ $post->id }}/update">
                @method('PATCH')

                @csrf
                <div class="form-group">
                    <label for="Title">Edit title:</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
                </div>
                <div class="form-group">
                    <label for="exampleSelect1">Edit categories:</label>
                    <select name="category" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="body">Edit description:</label>
                    <textarea id="body" name="body" class="form-control" rows="3">{{ $post->body }}</textarea>
                </div>
                <div class="form-group">
                    <label for="ingredients">Edit the ingredients:</label>
                    <textarea id="ingredients" name="ingredients" class="form-control" rows="3">{{ $post->ingredients }}</textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
    </div>
</div>
@endsection
