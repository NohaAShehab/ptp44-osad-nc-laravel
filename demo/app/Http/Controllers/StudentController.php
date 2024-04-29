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

    private function file_operations($request){
        # check if request has file or not
        if($request->hasFile('image')){
//            dd("found");
            # get_image_name
            $image = $request->file('image');
            # store in the  students_uploads
            $filepath=$image->store("images","students_uploads" );
            return $filepath;

        }
        return null;
    }
    function store(){
//        dd(request());
        $request_parms = request();
//        dd($request_parms);
        # create new object
        $file_path = $this->file_operations($request_parms);
//        dd($file_path);
        $request_parms = request()->all();

        $student = new Student();
        $student->name = $request_parms['name'];
        $student->email = $request_parms['email'];
        $student->image = $file_path;
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
