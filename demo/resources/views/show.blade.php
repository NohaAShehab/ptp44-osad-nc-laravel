@extends("layouts.app")

@section("body")
{{--        @dump($student)--}}

        <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$student['name']}}</h5>
                <p class="card-text">Salary:{{$student['salary']}}</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
@endsection

