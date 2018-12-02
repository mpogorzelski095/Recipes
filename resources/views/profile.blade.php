@extends('layouts.app')

@section('content')





<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $user->name }} profile</div>

                <div class="card-body">
                  <div class="row">
                    <div class="col-sm">

                        <img src="{{ $user->getUsersAvatar() }}" style="width: 150px; height: 150px; float: left; border-radius: 50%;">
                      <!-- <form method="POST" action="{{ route('profile') }}">

                          <div class="form-group row">
                              <label for="file" class="col-sm-4 col-form-label text-md-right">{{ __('Avatar') }}</label>
                              <div class="col-md-6">
                                  <input type="file" class="form-control" name="avatar">
                              </div>
                              <button type="submit" class="btn btn-primary">
                                  {{ __('Dodaj') }}
                              </button>
                          </div>
                      </form> -->

                        {{--<form enctype="multipart/form-data" method="POST" action="/profile">--}}
                            {{--@csrf--}}
                           {{----}}
                            {{--<div class="form-group">--}}
                                {{--<label for="exampleInputFile">File input</label>--}}
                                {{--<input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">--}}
                                {{--<small id="fileHelp" class="form-text text-muted">This is some placeholder.</small>--}}
                            {{--</div>--}}
                            {{--<button type="submit" class="btn btn-primary">Submit</button>--}}
                        {{--</form>--}}




                      {{--<button type="submit" class="btn btn-danger" style="float:left; margin-top:15px; margin-right:10px;">Delete</button>--}}
                      {{--<button type="submit" class="btn btn-primary" style="float:left; margin-top:15px;">Edit</button>--}}


                    <form enctype="multipart/form-data" action="/profile" method="POST">
                        <label>Update Profile Image</label>
                        <input type="file" name="avatar">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="btn-success">
                    </form>



                    </div>
                    <div class="col-sm">
                        <strong>Name:</strong> {{ $user->name }} <br>
                        <strong>Email:</strong> {{ $user->email }}
                    </div>
                    <div class="col-sm">
                      
                    </div>
                  </div>







                </div>
            </div>
        </div>
    </div>
</div>
@endsection
