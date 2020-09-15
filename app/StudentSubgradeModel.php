<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentSubgrade extends Model
{
    protected $table    = 'Student_Subgrade';
    protected $primaryKey = 'student_subgrade_id';
    protected $fillable = [
                            'student_grade_id',
                            'subgrade_id'
    ];

    public function classes() {
        return $this->belongsToMany('App\ClassesModel', 'Student_Class');
    }
}
