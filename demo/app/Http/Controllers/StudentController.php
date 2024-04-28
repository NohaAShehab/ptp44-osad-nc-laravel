<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    private $students= [
    ['id'=>1, 'name'=>'hussien', 'salary'=>20000],
    ['id'=>2, 'name'=>'noha', 'salary'=>20000],
    ['id'=>3, 'name'=>'alaa', 'salary'=>25000],
    ['id'=>4, 'name'=>'omnia', 'salary'=>50000],
    ];

    # set of properties

    # set of functions/actions
    function home (){

        return view("itihome", ["students"=>$this->students]);
    }
}
