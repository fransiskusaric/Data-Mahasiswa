<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeachersModel extends Model
{
    protected $table    = 'Teachers';
    protected $primaryKey = 't_id';
    protected $fillable = [
                            'name',
                            'teacher_id',
                            'address',
                            'city',
                            'birth_date',
                            'phone',
                            'course_id',
                            'grade_id',
                            'in_date',
                            'out_date'
    ];

    public function courses(){
        return $this->belongsTo('App\MCoursesModel', 'course_id');
    }

    public function grades(){
        return $this->belongsTo('App\MGradesModel', 'grade_id', 'grade_id');
    }

    public function classes(){
        return $this->belongsTo('App\ClassesModel', 'teacher_id', 'teacher_id');
    }
}
