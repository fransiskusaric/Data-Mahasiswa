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
}
