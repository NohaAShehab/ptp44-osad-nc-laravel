<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class StudentController extends Controller
{
    //


    # set of properties

    # set of functions/actions

    function index(){
        # select * from table students
        # 1- use query builder
//        $students = DB::table('students')->get();
        $students = DB::table('students')->select('name', 'id')->get();
        return $students;
    }

    function show($id){
        # get object from table
        # return with it
    }


}
