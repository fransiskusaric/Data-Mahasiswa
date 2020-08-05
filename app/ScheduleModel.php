<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScheduleModel extends Model
{
    protected $table    = 'schedule';
    protected $fillable = [
                            'room_id',
                            'day_id',
                            'hour_id',
                            'course_id',
                            'teacher_id'
    ];
}
