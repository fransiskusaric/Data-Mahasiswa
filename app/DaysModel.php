<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DaysModel extends Model
{
    protected $table    = 'days';
    protected $fillable = [
                            'day_id',
                            'day_name'
    ];
}
