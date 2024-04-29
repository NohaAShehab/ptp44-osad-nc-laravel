<?php
## here you can register your routes to your application

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

//Route::get("/students", function (){
//    $students = [
//        ['id'=>1, 'name'=>'hussien', 'salary'=>20000],
//        ['id'=>2, 'name'=>'noha', 'salary'=>20000],
//        ['id'=>3, 'name'=>'alaa', 'salary'=>25000],
//        ['id'=>4, 'name'=>'omnia', 'salary'=>50000],
//    ];
//
//    return $students;
//});


# student profile
//Route::get("/students/{id}", function ($id){
//    $students = [
//        ['id'=>1, 'name'=>'hussien', 'salary'=>20000],
//        ['id'=>2, 'name'=>'noha', 'salary'=>20000],
//        ['id'=>3, 'name'=>'alaa', 'salary'=>25000],
//        ['id'=>4, 'name'=>'omnia', 'salary'=>50000],
//    ];
////    return $students[$id-1];
//    if ($id <count($students)){
//        return $students[$id-1];
//    }
//   return abort(404);
//})->where('id', '[0-9]+'); # condition on route parameter


Route::get("/user/{id}", function ($id){
    # dump result
    dump(url()->current(), $id);  # string
    dump("1"==1);
    # print current url
    return url()->current();

});



# define route that returns with view directly

Route::view("/home", "home"); # return html page


# apply logic before returning with view
//Route::get("/homepage", function (){
//    return view("homepage");
//});

# send data to the page
Route::get("/homepage", function (){
    $students = [
        ['id'=>1, 'name'=>'hussien', 'salary'=>20000],
        ['id'=>2, 'name'=>'noha', 'salary'=>20000],
        ['id'=>3, 'name'=>'alaa', 'salary'=>25000],
        ['id'=>4, 'name'=>'omnia', 'salary'=>50000],
    ];
    return view("homepage",["students"=>$students]);
});



# blade template engine

Route::get("/test_template", function(){

    $students = [
        ['id'=>1, 'name'=>'hussien', 'salary'=>20000],
        ['id'=>2, 'name'=>'noha', 'salary'=>20000],
        ['id'=>3, 'name'=>'alaa', 'salary'=>25000],
        ['id'=>4, 'name'=>'omnia', 'salary'=>50000],
    ];
    return view("landing",["students"=>$students, "name"=>"noha"]);
});


//Route::get("/iti/home", function (){
//
//    return view("itihome");
//});


### we need to move to the controller
//use App\Http\Controllers\StudentController;
//Route::get("/iti/home",[StudentController::class,'home'] );
//Route::get("/iti/{id}", [StudentController::class,'show']);


# introduce url names
use App\Http\Controllers\ITIController;
Route::get("/iti/home",[ITIController::class,'home'] )->name('iti.home');
Route::get("/iti/{id}", [ITIController::class,'show'])->name('iti.show')
->where('id', '[0-9]+');

use App\Http\Controllers\StudentController;
Route::get('/students', [StudentController::class,'index'])
    ->name('students.index');

Route::get('/students/{id}', [StudentController::class,'show'])
    ->name('students.show');










