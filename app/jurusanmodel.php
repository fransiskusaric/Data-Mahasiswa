<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jurusanmodel extends Model
{
    protected $table    = 'tbjurusan';
    protected $fillable = [
                            'idJurusan',
                            'jurusan'
    ];
    
    public function mahasiswas(){
        return $this->hasMany('App\mahasiswamodel','idJurusan','idJurusan');
    }
}
