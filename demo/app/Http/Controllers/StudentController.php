<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\Track;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;


class StudentController extends Controller
{
    //


    # set of properties

    # set of functions/actions

    function index(){

        $students = Student::paginate($perPage = 5, $columns = ['*'], $pageName = 'students');

        return view('students.index', ['students' => $students]);
    }

    function show($id){
        $student = Student::findOrFail($id);  # return 404 not found if object doesn't exist
        return view('students.show', ['student' => $student]);
    }
    function create(){
        $tracks = Track::all();
        return view('students.create', ['tracks' => $tracks]);
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
    function store(StoreStudentRequest $request){
        # first the post request received --> apply validation rules defined in the store-request class
        $request_parms= $request;
        $file_path = $this->file_operations($request_parms);
        $request_parms = request()->all();
        $request_parms['image'] = $file_path;
        $student = Student::create($request_parms);
        $student->save();
        return to_route("students.show", $student->id);
    }

    function edit($id){
        $student = Student::findOrFail($id);
        return view('students.edit', ['student' => $student]);
    }

    function update(UpdateStudentRequest $request,  $id){
        $updated_data = $request;
        $student = Student::findOrFail($id);
        dd($student, $updated_data->all());
        # do update operation
    }


    function destroy($id){
        $student = Student::findOrFail($id);
        $student->delete();
        # delete image
        return to_route('students.index');

    }



}
