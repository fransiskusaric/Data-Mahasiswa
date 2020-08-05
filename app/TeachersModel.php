<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeachersModel extends Model
{
    protected $table    = 'teachers';
    protected $fillable = [
                            'name',
                            'address',
                            'city',
                            'birth_date',
                            'phone',
                            'course_id',
                            'grade_id',
                            'in_date',
                            'out_date'
    ];
}
