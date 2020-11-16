<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassesModel extends Model
{
    protected $table    = 'Classes';
    protected $primaryKey = 'classroom_id';
    public $incrementing = false;
    protected $fillable = [
                            'classroom_id',
                            'grade_id',
                            'subgrade_id',
                            'classroom',
                            'major_id',
                            'teacher_id'
    ];

    public function majors() {
        return $this->hasOne('App\MMajorsModel', 'major_id', 'major_id');
    }

    public function studentSubgrade() {
        return $this->belongsToMany('App\StudentSubgradeModel', 'Student_Class', 'classroom_id', 'student_subgrade_id');
    }

    public function teachers() {
        return $this->hasOne('App\TeachersModel', 'teacher_id', 'teacher_id');
    }
}
