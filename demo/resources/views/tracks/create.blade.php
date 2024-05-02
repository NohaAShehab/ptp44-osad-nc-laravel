@extends('layouts.app')


@section('content')
    <h1> Create new Track </h1>
{{--    @if ($errors->any())--}}
{{--        <div class="alert alert-danger">--}}
{{--            <ul>--}}
{{--                @foreach ($errors->all() as $error)--}}
{{--                    <li>{{ $error }}</li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    @endif--}}

    @error('owner_id')
    <div class="alert alert-danger " >{{ $message }}</div>
    @enderror
    <form method="post" action="{{route('tracks.store')}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{Auth::id()}}" name="owner_id">
        <div class="mb-3">
            <label  class="form-label">Name</label>
            <input type="text" name="name" class="form-control"
            value="{{old('name')}}">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label  class="form-label">about</label>
            <input type="text"  name='about' class="form-control"
                   value="{{old('about')}}"
                   aria-describedby="emailHelp">
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
