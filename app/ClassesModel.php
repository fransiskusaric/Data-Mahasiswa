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

    public function students(){
        return $this->hasMany('App\StudentsModel', 'room_id', 'classroom');
    }
}
