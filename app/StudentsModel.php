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
                            'gen',
                            'birth_date',
                            'grade_id',
                            'major_id',
                            'classroom'
    ];
}
