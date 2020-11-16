<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MSubgradesModel extends Model
{
    protected $table    = 'M_Subgrades';
    protected $primaryKey = 'subgrade_id';
    protected $fillable = [
                            'subgrade_id',
                            'subgrade'
    ];

    public function grades() {
        return $this->belongsToMany('App\MGradesModel', 'Classes');
    }

    public function studentGrade() {
        return $this->belongsToMany('App\StudentGradeModel', 'Student_Subgrade', 'subgrade_id', 'student_grade_id');
    }
}
