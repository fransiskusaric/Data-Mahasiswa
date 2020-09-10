<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentCourseScoreModel extends Model
{
    protected $table    = 'Student_Course_Score';
    protected $primaryKey = 'student_course_score_id';
    protected $fillable = [
                            'score_id',
                            'task',
                            'mid_test',
                            'final_test',
                            'score'
    ];

    public function score() {
        return $this->belongsTo('App\StudentScoresModel', 'score_id', 'score_id');
    }
}
