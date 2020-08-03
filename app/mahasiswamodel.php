<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class mahasiswamodel extends Model
{
    protected $table    = 'mahasiswa';
    protected $fillable = [
                            'nama',
                            'nim',
                            'idJurusan',
                            'TglMasuk',
                            'TglKeluar'
    ];

    public function jurusan(){
        return $this->belongsTo('App\jurusanmodel', 'idJurusan', 'idJurusan');
    }

    public static function insertMhs($data){
        $mahasiswa=DB::table('mahasiswa')->where('nim', $data['nim'])->get();
        if($mahasiswa->count() == 0){
            DB::table('mahasiswa')->insert($data);
            return 1;
        } else {
            return 0;
        }
    }
}