<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GradesModel extends Model
{
    protected $table    = 'grades';
    protected $fillable = [
                            'grade_id',
                            'grade'
    ];
}
