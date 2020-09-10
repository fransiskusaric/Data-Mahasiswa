<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MCoursesModel extends Model
{
    protected $table    = 'M_Courses';
    protected $primaryKey = 'course_id';
    protected $fillable = [
                            'course_id',
                            'course'
    ];

    public function grades() {
        return $this->belongsToMany('App\MGradesModel', 'Course_Grade');
    }
}
