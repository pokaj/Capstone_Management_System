<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Casptone_Table extends Model
{
    protected $table = 'capstone_table';
    protected $fillable = ['cp_supervisor','cp_student','cp_project','cp_startdate','cp_enddate'];
    public $timestamps = false;
}
