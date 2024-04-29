<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
//    protected $table = 'iti_students';
}


# laravel detects that this model is connected
# to table students

# if I need the model to represent table iti_students
