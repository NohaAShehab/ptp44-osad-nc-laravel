@extends('layouts.app')


@section('content')
{{--    @dump($students)--}}

    <h1 > All students from db </h1>

    <a href="{{route('students.create')}}" class="btn btn-dark">Create new Student </a>
    <table class='table'> <tr> <td>ID </td> <td> Name</td>
            <td> Email</td> <td> Created_by</td> <td> Gender</td>
             <td> Show </td>
            <td> Edit</td>
            <td> Delete</td>
            </tr>
        @foreach($students as $student)
            <tr>

                <td> {{$student->id}}</td>
                <td> {{$student->name}}</td>
                <td> {{$student->email}}</td>
                <td> {{$student->creator ? $student->creator->name : "no creator"}}</td>
                <td> {{$student->gender}}</td>
                <td> <a href="{{route('students.show', $student->id)}}" class="btn btn-info">Show  </a></td>

                <td> <a href="{{route('students.edit', $student->id)}}" class="btn btn-warning">Edit  </a></td>
{{--                <td> <a href="{{route('students.destroy', $student->id)}}" class="btn btn-danger">Delete  </a></td>--}}
                <td>
                    <form method="post" action="{{route('students.destroy', $student->id)}}">
                        @method('delete')
                        @csrf
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
                </td>
            </tr>

        @endforeach

    </table>
{{ $students->links() }}


@endsection
