<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeachersModel extends Model
{
    protected $table    = 'teachers';
    protected $fillable = [
                            'name',
                            'teacher_id',
                            'address',
                            'city',
                            'birth_date',
                            'phone',
                            'course_id',
                            'in_date',
                            'out_date'
    ];

    public function courses(){
        return $this->belongsTo('App\CoursesModel', 'course_id', 'course_id');
    }

    public function classes(){
        return $this->belongsTo('App\ClassesModel', 'teacher_id', 'teacher_id');
    }
}
