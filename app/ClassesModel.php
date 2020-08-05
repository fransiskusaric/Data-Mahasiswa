<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassesModel extends Model
{
    protected $table    = 'classes';
    protected $fillable = [
                            'room_id',
                            'room',
                            'grade_id'
    ];
}
