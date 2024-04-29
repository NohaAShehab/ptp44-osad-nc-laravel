<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;


class StudentController extends Controller
{
    //


    # set of properties

    # set of functions/actions

    function index(){
        # select * from table students
        # 1- use query builder
//        $students = DB::table('students')->get();
//        $students = DB::table('students')->select('name', 'id')->get();
//        return $students;
        #2- use model to get data
        $students = Student::all();
//        dd($students); ## display content of variable
        #then stop the execution
//        return $students;
        return view('students.index', ['students' => $students]);
    }

    function show($id){
//        dd($id);
        # get object from table
        # return with it
        # find of object exists - -> with this id
        # select * from students where id = $id;
//        $student = Student::find($id);
////        dd($student);
//        if ($student == null){
////            return to_route('students.index');
//            return abort(404);
//        }
        $student = Student::findOrFail($id);  # return 404 not found if object doesn't exist
        return view('students.show', ['student' => $student]);
    }
    function create(){
        return view('students.create');
    }

    function store(){
//        dd("store function");
         # get request data
//        dd($_POST);
        # get request data
//        dump(request());
        $request_parms = request()->all();
//        dd($request_parms);
        # create new object
        $student = new Student();
        $student->name = $request_parms['name'];
        $student->email = $request_parms['email'];
        $student->image = $request_parms['image'];
        $student->gender = $request_parms['gender'];
        $student->grade = $request_parms['grade'];
//        dd($student);
        # save object
        $student->save();
        return to_route("students.show", $student->id);



    }

    function edit($id){
        $student = Student::findOrFail($id);
        return view('students.edit', ['student' => $student]);
    }

    function update( $id){

        $student = Student::findOrFail($id);
        $updated_data = request()->all();
        dd($student, $updated_data);
        # do update operation
    }


    function destroy($id){
        $student = Student::findOrFail($id);
        $student->delete();
        return to_route('students.index');

    }



}
