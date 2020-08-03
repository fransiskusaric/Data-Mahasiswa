<?php

namespace App\Imports;

use App\mahasiswamodel;
use Maatwebsite\Excel\Concerns\ToModel;

class mahasiswaimport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new mahasiswamodel([
            'nama'      => $row[0],
            'nim'       => $row[1],
            'idJurusan' => $row[2],
            'TglMasuk'  => $row[3],
            'TglKeluar' => $row[4]
        ]);
    }
}
