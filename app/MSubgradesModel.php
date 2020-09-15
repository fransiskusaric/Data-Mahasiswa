<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MSubgrades extends Model
{
    protected $table    = 'M_Subgrades';
    protected $primaryKey = 'subgrade_id';
    protected $fillable = [
                            'subgrade_id'
    ];

    public function grades() {
        return $this->belongsToMany('App\MGradesModel', 'Classes');
    }

    public function studentGrade() {
        return $this->belongsToMany('App\StudentGradeModel', 'Student_Subgrade');
    }
}
