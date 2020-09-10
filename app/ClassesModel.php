<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassesModel extends Model
{
    protected $table    = 'Classes';
    protected $primaryKey = 'class_id';
    protected $fillable = [
                            'class_id',
                            'grade_id',
                            'classroom',
                            'major_id',
                            'teacher_id',
                            'qty'
    ];

    public function grades() {
        return $this->belongsTo('App\MGradesModel', 'grade_id', 'grade_id');
    }

    public function majors() {
        return $this->belongsTo('App\MMajorsModel', 'major_id', 'major_id');
    }

    public function students() {
        return $this->belongsToMany('App\StudentGradeModel', 'Student_Class');
    }

    public function teachers() {
        return $this->hasOne('App\TeachersModel', 'teacher_id', 'teacher_id');
    }
}
