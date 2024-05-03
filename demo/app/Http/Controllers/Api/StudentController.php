<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Resources\StudentResource;

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
//        return $students;
        # return resource for set of objects
        return StudentResource::collection($students);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        # validate post request
        $std_validator = Validator::make($request->all(),
            [
                'name' => 'required',
                'email' => 'required|unique:students',
                'grade' => 'required',
            ]);

//        # check if request validation failed
//        dd($std_validator->fails());
        if ($std_validator->fails()) {
//            return response()->json($std_validator->errors(), 422);
            return response()->json(
                [
                    'validation_errors' => $std_validator->errors(),
                    'message' =>'please review your post form data',
                    'typealert'=>'danger'
                ], 422
            );
        }

        $file_path = $this->file_operations($request);
        $request_parms = request()->all();
        $request_parms['image'] = $file_path;
        $student = Student::create($request_parms);
        $student->save();
//        return $student;
        return new StudentResource($student);

    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
//        return $student;
        return new StudentResource($student);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //

        $std_validator = Validator::make($request->all(),
            [
                'name' => 'required',
                'email' => Rule::unique('students')->ignore($student),
                'grade' => 'required',
            ]);


        if ($std_validator->fails()) {
            return response()->json(
                [
                    'validation_errors' => $std_validator->errors(),
                    'message' =>'please review your post form data',
                    'typealert'=>'danger'
                ], 422
            );
        }

        $file_path = $this->file_operations($request);
        $request_parms = request()->all();

        if($file_path != null){
//            dd('found', $file_path);
            $request_parms['image'] = $file_path;
        }

        $student->update($request_parms);
//        return $student;
        return new StudentResource($student);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
        $student->delete();
//        return 'deleted';
        return response()->json('delete', 204);
    }
}
