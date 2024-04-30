@extends('layouts.app')


@section('content')
    <h1> Create new Track </h1>
    <form method="post" action="{{route('tracks.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label  class="form-label">Name</label>
            <input type="text" name="name" class="form-control"  >
        </div>
        <div class="mb-3">
            <label  class="form-label">about</label>
            <input type="text"  name='about' class="form-control"  aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label  class="form-label">Logo</label>
            <input type="file" name="logo" class="form-control"  aria-describedby="emailHelp">
        </div>

        <button type="submit"
                class="btn btn-success">Save Track</button>
    </form>

@endsection
