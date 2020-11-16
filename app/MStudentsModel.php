<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MStudentsModel extends Model
{
    protected $table    = 'M_Students';
    protected $primaryKey = 's_id';
    protected $fillable = [
                            'name',
                            'student_id',
                            'address',
                            'city',
                            'birth_date',
                            'phone'
    ];

    public function grades() {
        return $this->belongsToMany('App\MGradesModel', 'Student_Grade', 'student_id', 'grade_id');
    }
}
