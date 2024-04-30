<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;
    protected $fillable= ['name','logo','about']; # here you can define the fields names you want to pass to the object
    # from the array the model receive
//    protected $guarded = ['_token']; # add fields you want not to pass
}
