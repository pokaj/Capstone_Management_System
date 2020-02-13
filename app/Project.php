<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Project extends Model
{
    protected $table = 'project';
    protected $primaryKey = 'project_Id';
    public $timestamps = false;

    public function users(){

        return $this->hasMany(Student::class);
    }

}
