@extends("layouts.app")

@section("content")
    {{$student}}
        <div class="card" style="width: 18rem;">
            <img height="300"
                src="{{asset('images/students/'.$student->image)}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$student->name}}</h5>
                <p class="card-text">Email:{{$student->email}}</p>
                <p class="card-text">Created_at:{{$student->created_at}}</p>
                <h5 class=""> Track: {{$student->track_id ? $student->track->name : "No track yet"  }} </h5>
                @if($student->track_id)
                <h5 class=""> Track Name: <a href="{{route('tracks.show', $student->track->id)}}">
                        {{$student->track->name}}  </a></h5>
                @endif
                <p class="card-text">Updated_at:{{$student->updated_at}}</p>

{{--                {{ url()->previous() }}--}}
                <a href="{{ url()->previous() }}" class="btn btn-primary">Back to all students </a>

            </div>
        </div>

    <div>
        <h1> My colleagues</h1>
        @if($student->track_id)
{{--            {{$student->track->students}}--}}
                @foreach($student->track->students as $std)
                    @if($std->id != $student->id)
                    <li> {{$std->name}}</li>
                @endif
                @endforeach
        @endif
    </div>
@endsection

