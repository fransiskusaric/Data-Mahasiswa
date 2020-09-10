<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MMajorsModel extends Model
{
    protected $table    = 'M_Majors';
    protected $primaryKey = 'major_id';
    protected $fillable = [
                            'major_id',
                            'major'
    ];

    public function classes() {
        return $this->hasMany('App\ClassesModel', 'major_id', 'major_id');
    }
}
