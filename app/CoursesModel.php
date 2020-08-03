<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoursesModel extends Model
{
    protected $table    = 'courses';
    protected $fillable = [
                            'course_id',
                            'course'
    ];
}
