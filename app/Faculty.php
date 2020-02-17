<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $table = 'faculty';
    public $timestamps = false;

    protected $fillable = [
        'faculty_Id', 'faculty_dept', 'faculty_interests',
    ];

}
