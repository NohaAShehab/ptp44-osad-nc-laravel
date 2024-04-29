@extends('layouts.app')


@section('content')
{{--    @dump($students)--}}

    <h1 style="background-color: white;"> All students from db </h1>
    <h5 style="color:green;"> laravel blade --> if you sending objects to the blade
    you can deal with them as an associative array </h5>
    <a href="{{route('students.create')}}" class="btn btn-dark">Create new Student </a>
    <table class='table'> <tr> <td>ID </td> <td> Name</td>
            <td> Email</td> <td> Grade</td> <td> Gender</td>
             <td> Show </td>
            <td> Edit</td>
            <td> Delete</td>
            </tr>
        @foreach($students as $student)
            <tr>
{{--                <td> {{$student['id']}}</td>--}}
{{--                <td> {{$student['name']}}</td>--}}
                <td> {{$student->id}}</td>
                <td> {{$student->name}}</td>
                <td> {{$student->email}}</td>
                <td> {{$student->grade}}</td>
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

@endsection
