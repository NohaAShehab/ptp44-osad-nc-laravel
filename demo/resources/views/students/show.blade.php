@extends("layouts.app")

@section("content")
        <div class="card" style="width: 18rem;">
            <img height="300"
                src="" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$student->name}}</h5>
                <p class="card-text">Email:{{$student->email}}</p>
                <a href="{{route("students.index")}}" class="btn btn-primary">Back to all students </a>
            </div>
        </div>
@endsection

