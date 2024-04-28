@extends("layouts.app")

@section("body")
{{--        @dump($student)--}}
@dump($student['image'])
        <div class="card" style="width: 18rem;">
            <img height="300"
                src="{{asset('images/iti/'.$student['image'])}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$student['name']}}</h5>
                <p class="card-text">Salary:{{$student['salary']}}</p>
                <a href="{{route("iti.home")}}" class="btn btn-primary">Back</a>
            </div>
        </div>
@endsection

