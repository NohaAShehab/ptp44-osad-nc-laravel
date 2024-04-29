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
    function create(){}

    function store(Request $request){}

    function edit($id){}

    function update(Request $request, $id){}


    function destroy($id){
        $student = Student::findOrFail($id);
        $student->delete();
        return to_route('students.index');

    }



}
