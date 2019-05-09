<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    
    
      protected $fillable = [
        'name',
        'reg_no',
        'dob',
        'gender',
        'nationality',
        'email',
        'phone_no',
        'address',
        'county'

    ];
}
