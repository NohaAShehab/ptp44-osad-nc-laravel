<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


# define new route
# this function --> do the controller role
Route::get("/osad", function (){

    return "Hello from Ghaza";
});

# define different routes

Route::get("/iti", function (){

    return "<h1> Welcome to iti website </h1>";
});

Route::get("/students", function (){
    $students = [
        ['id'=>1, 'name'=>'hussien', 'salary'=>20000],
        ['id'=>2, 'name'=>'noha', 'salary'=>20000],
        ['id'=>3, 'name'=>'alaa', 'salary'=>25000],
        ['id'=>4, 'name'=>'omnia', 'salary'=>50000],
    ];

    return $students;
});


# student profile
Route::get("/students/{id}", function ($id){
    $students = [
        ['id'=>1, 'name'=>'hussien', 'salary'=>20000],
        ['id'=>2, 'name'=>'noha', 'salary'=>20000],
        ['id'=>3, 'name'=>'alaa', 'salary'=>25000],
        ['id'=>4, 'name'=>'omnia', 'salary'=>50000],
    ];
//    return $students[$id-1];
    if ($id <count($students)){
        return $students[$id-1];
    }
   return abort(404);
})->where('id', '[0-9]+'); # condition on route parameter


Route::get("/user/{id}", function ($id){
    # dump result
    dump(url()->current(), $id);  # string
    dump("1"==1);
    # print current url
    return url()->current();

});








