
@extends('layouts.app')

{{--@section("body")--}}
{{--<h1 class="text-danger"> Welcome to iti home page </h1>--}}
{{--@endsection--}}

@section("content")
{{--    <h1> Introducing laravel layouts </h1>--}}
    <h1 style="background-color: white;"> All students </h1>
    <table class='table'> <tr> <td>ID </td> <td> Name</td>
            <td>Salary</td> <td> Show </td></tr>
        @foreach($students as $student)
            <tr>
                <td> {{$student['id']}}</td>
                <td> {{$student['name']}}</td>
                <td> {{$student['salary']}}</td>
{{--                <td> <a href="/iti/{{$student['id']}}" class="btn btn-info">Show  </a></td>--}}
                <td> <a href="{{route('iti.show',$student['id'] )}}" class="btn btn-info">Show  </a></td>

            </tr>

        @endforeach

    </table>
@endsection


{{--<h1>jfhskjfh</h1>--}}
