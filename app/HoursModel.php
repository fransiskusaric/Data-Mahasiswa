<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoursModel extends Model
{
    protected $table    = 'hours';
    protected $fillable = [
                            'hour_id',
                            'hour_from',
                            'hour_to'
    ];
}
