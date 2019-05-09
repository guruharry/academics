<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marks extends Model
{
	 protected $fillable = [
     
      'course',
      'student',
      'semester',
      'unit',
      'exam',
      'marks'
    ];

}
