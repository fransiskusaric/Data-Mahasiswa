<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeachersModel extends Model
{
    protected $table    = 'teachers';
    protected $fillable = [
                            'name',
                            'address',
                            'course_id',
                            'in_date',
                            'out_date'
    ];
}
