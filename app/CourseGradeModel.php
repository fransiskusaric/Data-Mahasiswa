<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseGradeModel extends Model
{
    protected $table    = 'Course_Grade';
    protected $primaryKey = 'course_grade_id';
    protected $fillable = [
                            'course_id',
                            'grade_id',
                            'major_id'
    ];

    public function studentClass() {
        return $this->belongsToMany('App\StudentClassModel', 'Student_Scores');
    }
}
