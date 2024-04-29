@extends('layouts.app')


@section('content')
{{--    @dump($students)--}}

    <h1 style="background-color: white;"> All students from db </h1>
    <h5 style="color:green;"> laravel blade --> if you sending objects to the blade
    you can deal with them as an associative array </h5>
    <table class='table'> <tr> <td>ID </td> <td> Name</td>
            <td> Email</td> <td> Grade</td> <td> Gender</td>
             <td> Show </td></tr>
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

            </tr>

        @endforeach

    </table>

@endsection
