<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoursesModel extends Model
{
    protected $table    = 'courses';
    protected $fillable = [
                            'course_id',
                            'course',
                            'note'
    ];

    public function teachers(){
        return $this->hasMany('App\TeachersModel', 'course_id', 'course_id');
    }
}
