<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentGradeModel extends Model
{
    protected $table    = 'Student_Grade';
    protected $primaryKey = 'student_grade_id';
    protected $fillable = [
                            'student_id',
                            'grade_id',
                            'enroll_date',
                            'grade_date'
    ];

    public function classes() {
        return $this->belongsToMany('App\ClassesModel', 'Student_Class');
    }
}
