@extends('layouts.app')


@section('content')
    <h1> Create new Student </h1>
    <form method="post" action="{{route('students.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label  class="form-label">Name</label>
            <input type="text" name="name" class="form-control"  >
        </div>
        <div class="mb-3">
            <label  class="form-label">Email</label>
            <input type="email"  name='email' class="form-control"  aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label  class="form-label">Image</label>
            <input type="file" name="image" class="form-control"  aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label  class="form-label">Grade</label>
            <input type="number" name="grade" class="form-control"  aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label  class="form-label">Gender</label>

            <div class="form-check">
                <input class="form-check-input"  name="gender"
                       type="radio" name="flexRadioDefault" value="male" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                    Male
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input"  name="gender"
                       type="radio" name="flexRadioDefault" value="female" id="flexRadioDefault2" >
                <label class="form-check-label" for="flexRadioDefault2">
                   Female
                </label>
            </div>

        </div>
        <div class="mb-3">
            <label  class="form-label">Track</label>
            <select class="form-select" aria-label="Default select example" name="track_id">
                <option selected disabled value=""> Choose track</option>
                @foreach($tracks as $track)
                    <option value="{{$track->id}}">{{$track->name}}</option>
                @endforeach

            </select>
        </div>
        <button type="submit"
                class="btn btn-success">Save student</button>
    </form>

@endsection
