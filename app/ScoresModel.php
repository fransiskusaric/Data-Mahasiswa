<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScoresModel extends Model
{
    protected $table    = 'scores';
    protected $fillable = [
                            'student_id',
                            'course_id',
                            'task',
                            'mid_test',
                            'final_test',
                            'score'
    ];
}
