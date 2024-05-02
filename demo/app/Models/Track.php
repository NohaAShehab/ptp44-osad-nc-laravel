<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;
    protected $fillable= ['name','logo','about', 'owner_id']; # here you can define the fields names you want to pass to the object
    # from the array the model receive
//    protected $guarded = ['_token']; # add fields you want not to pass

    # track has many students
    function students(){
        # one to many
        return $this->hasMany(Student::class);
    }

    function owner(){
        return $this->belongsTo(User::class,
            'owner_id', 'id');
    }
}
