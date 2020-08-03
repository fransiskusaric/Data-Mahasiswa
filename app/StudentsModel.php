<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentsModel extends Model
{
    protected $table    = 'students';
    protected $fillable = [
                            'student_id',
                            'name',
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
}
