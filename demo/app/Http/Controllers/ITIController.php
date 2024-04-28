<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ITIController extends Controller
{
    //
    private $students= [
        ['id'=>1, 'name'=>'hussien', 'salary'=>20000, 'image'=>'pic1.png'],
        ['id'=>2, 'name'=>'noha', 'salary'=>20000,'image'=>'pic2.png'],
        ['id'=>3, 'name'=>'alaa', 'salary'=>25000,'image'=>'pic3.png'],
        ['id'=>4, 'name'=>'omnia', 'salary'=>50000, 'image'=>'pic4.png']
    ];

    # set of properties

    # set of functions/actions
    function home (){

        return view("itihome", ["students"=>$this->students]);
    }

    function show($id){
        if ($id <=count($this->students)){
            $std =$this->students[$id-1];
            return view('show', ["student"=>$std]);
        }
        return abort(404);

    }

    function edit($id){
        if ($id <=count($this->students)){
            $std =$this->students[$id-1];
            return view('edit', ["student"=>$std]);
        }
        return abort(404);

    }
}
