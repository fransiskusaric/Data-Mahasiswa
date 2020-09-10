<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MGradesModel extends Model
{
    protected $table    = 'M_Grades';
    protected $primaryKey = 'grade_id';
    protected $fillable = [
                            'grade_id',
                            'grade'
    ];

    public function courses() {
        return $this->belongsToMany('App\MCoursesModel', 'Course_Grade');
    }

    public function classes() {
        return $this->hasMany('App\ClassesModel', 'grade_id', 'grade_id');
    }

    public function students() {
        return $this->belongsToMany('App\MStudentsModel', 'Student_Grade');
    }
}
