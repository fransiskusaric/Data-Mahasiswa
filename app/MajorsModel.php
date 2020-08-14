<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MajorsModel extends Model
{
    protected $table    = 'majors';
    protected $fillable = [
                            'major_id',
                            'major'
    ];

    public function students(){
        return $this->hasMany('App\StudentsModel', 'major_id', 'major_id');
    }
}
