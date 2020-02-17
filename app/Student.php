<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Student extends Model
{
    protected $table = 'student';
    protected $primaryKey = 'student_Id';
    public $timestamps = false;

    public function User(){
        return $this->belongsTo('User');
    }

    protected $fillable = [
        'student_Id', 'student_user_id', 'student_yeargroup', 'student_major',
    ];



}
