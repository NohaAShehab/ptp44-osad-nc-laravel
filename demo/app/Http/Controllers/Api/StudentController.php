<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{


    private function file_operations($request){
        if($request->hasFile('image')){

            $image = $request->file('image');
            $filepath=$image->store("images","students_uploads" );
            return $filepath;

        }
        return null;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $students = Student::all();
        return $students;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        # validate post request
        $file_path = $this->file_operations($request);
        $request_parms = request()->all();
        $request_parms['image'] = $file_path;
        $student = Student::create($request_parms);
        $student->save();
        return $student;
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
        return $student;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
        $student->delete();
        return 'deleted';
    }
}
