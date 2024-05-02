<?php

namespace App\Models;

use App\Models\Track;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
//    protected $table = 'iti_students';
    protected $fillable=['name', 'email', 'image','grade', 'gender','track_id','creator_id'];

    # define relation between models
    # student studies only in one track
    function track(){
        # many to one
        return $this->belongsTo(Track::class);
    }
//    function trackinfo(){
//        return $this->belongsTo(Track::class,
//        'track_id','id');
//    }

    function creator(){
        return $this->belongsTo(User::class,'creator_id', 'id');
    }
}


# laravel detects that this model is connected
# to table students

# if I need the model to represent table iti_students
