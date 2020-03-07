<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty_Student extends Model
{
    protected $table = 'faculty_student';
    protected $fillable = ['student_Id','faculty_Id'];
    public $timestamps = false;
}
