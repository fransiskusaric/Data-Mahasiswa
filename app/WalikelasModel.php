<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WalikelasModel extends Model
{
    protected $table    = 'walikelas';
    protected $fillable = [
                            'teacher_id',
                            'room_id'
    ];
}
