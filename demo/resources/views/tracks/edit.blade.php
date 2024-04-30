@extends('layouts.app')


@section('content')
    <h1> Edit Track </h1>
    <img src="{{asset('images/tracks/'.$track->logo)}}" width="100" height="100">
    <form method="post" action="{{route('tracks.update', $track->id)}}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
            <label  class="form-label">Name</label>
            <input type="text" name="name" class="form-control"
            value="{{$track->name}}">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label  class="form-label">about</label>
            <input type="text"  name='about' class="form-control"
                   value="{{$track->about}}">
            @error('about')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label  class="form-label">Logo</label>
            <input type="file" name="logo" class="form-control"  aria-describedby="emailHelp">
        </div>

        <button type="submit"
                class="btn btn-success">Save Track</button>
    </form>

@endsection
