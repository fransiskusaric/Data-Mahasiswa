<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentClassModel extends Model
{
    protected $table    = 'Student_Class';
    protected $primaryKey = 'student_class_id';
    protected $fillable = [
                            'student_subgrade_id',
                            'classroom_id'
    ];

    public function courseGrade() {
        return $this->belongsToMany('App\CourseGradeModel', 'Student_Scores');
    }
}
