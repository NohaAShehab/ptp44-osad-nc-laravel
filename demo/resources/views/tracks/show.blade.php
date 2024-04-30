@extends("layouts.app")

@section("content")
        <div class="card" style="width: 18rem;">
            <img height="300"
                src="{{asset('images/tracks/'.$track->logo)}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$track->name}}</h5>
                <p class="card-text">About:{{$track->About}}</p>
                <p class="card-text">Created_at:{{$track->created_at}}</p>
                <p class="card-text">Updated_at:{{$track->updated_at}}</p>

                <a href="{{ url()->previous() }}" class="btn btn-primary">Back to all tracks </a>

            </div>
        </div>
@endsection

