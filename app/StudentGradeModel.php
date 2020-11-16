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

    public function subgrades() {
        return $this->belongsToMany('App\MSubgradesModel', 'Student_Subgrade', 'student_grade_id', 'subgrade_id');
    }
}
