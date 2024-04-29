@extends('layouts.app')


@section('content')
    <h1>Update Student {{$student->name}} </h1>
    <form method="post" action="{{route('students.update', $student->id)}}">
        @csrf
        @method('put')
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
            <input type="text" name="image" class="form-control"  aria-describedby="emailHelp">
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
        <button type="submit"
                class="btn btn-success">Save student</button>
    </form>

@endsection
