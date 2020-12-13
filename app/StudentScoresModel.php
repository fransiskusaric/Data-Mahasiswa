<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentScoresModel extends Model
{
    protected $table    = 'Student_Scores';
    protected $primaryKey = 'score_id';
    protected $fillable = [
                            'student_class_id',
                            'course_grade_id',
                            'task',
                            'mid_test',
                            'final_test',
                            'score'
    ];
}
