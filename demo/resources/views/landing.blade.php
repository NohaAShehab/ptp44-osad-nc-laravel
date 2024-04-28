<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Students Home </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <h1> Welcome to blade templates </h1>
{{--       {{$students}}--}}
        <h3> {{$name}}</h3>
        <h1> display data for test </h1>
{{--        @dump($students)--}}
        <h1> Blade provides set of functionality </h1>
        <h2> display data in table </h2>
        <table class='table'> <tr> <td>ID </td> <td> Name</td>
            <td>Salary</td> <td> Show </td></tr>
            @foreach($students as $student)
                <tr>
                    <td> {{$student['id']}}</td>
                    <td> {{$student['name']}}</td>
                    <td> {{$student['salary']}}</td>
                    <td> <a href="" class="btn btn-info">Show  </a></td>
                </tr>

            @endforeach

        </table>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
