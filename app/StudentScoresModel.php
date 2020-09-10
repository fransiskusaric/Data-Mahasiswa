<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentScoresModel extends Model
{
    protected $table    = 'Student_Scores';
    protected $primaryKey = 'score_id';
    protected $fillable = [
                            'student_class_id',
                            'course_grade_id'
    ];

    public function courseScore() {
        return $this->hasOne('App\StudentCourseScoreModel', 'score_id', 'score_id');
    }
}
