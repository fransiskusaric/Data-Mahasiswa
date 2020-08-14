<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentsModel extends Model
{
    protected $table    = 'students';
    protected $fillable = [
                            'name',
                            'student_id',
                            'address',
                            'city',
                            'birth_date',
                            'phone',
                            'grade_id',
                            'major_id',
                            'classroom',
                            'enroll_year',
                            'grad_year'
    ];

    public function grades(){
        return $this->belongsTo('App\GradesModel', 'grade_id', 'grade_id');
    }

    public function majors(){
        return $this->belongsTo('App\MajorsModel', 'major_id', 'major_id');
    }

    public function classes(){
        return $this->belongsTo('App\ClassesModel', 'classroom', 'room_id');
    }
}
