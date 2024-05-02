@extends('layouts.app')


@section('content')


    <h1 > All Tracks from db </h1>

    <a href="{{route('tracks.create')}}" class="btn btn-dark">Create new Track </a>
    <table class='table'> <tr> <td>ID </td> <td> Name</td>
            <td> Owner</td>
             <td> Show </td>
            <td> Edit</td>
            <td> Delete</td>
            </tr>
        @foreach($tracks as $track)
            <tr>

                <td> {{$track->id}}</td>
                <td> {{$track->name}}</td>

                <td> {{$track->owner ? $track->owner->name : "default"}}</td>
                <td> <a href="{{route('tracks.show', $track->id)}}" class="btn btn-info">Show  </a></td>


                    <td> <a href="{{route('tracks.edit', $track->id)}}" class="btn btn-warning">Edit  </a></td>
                   @can('delete', $track)
                    <td>
                        <form method="post" action="{{route('tracks.destroy', $track->id)}}">
                            @method('delete')
                            @csrf
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                    </td>
                @else
                    <td> You cannot delete this track </td>
                @endcan

            </tr>

        @endforeach

    </table>
{{ $tracks->links() }}


@endsection
