<?php

namespace App\Imports;

use App\TeachersModel;
use Maatwebsite\Excel\Concerns\ToModel;

class TeachersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if(!TeachersModel::where('teacher_id', '=', $row[1])->exists()) {
            return new TeachersModel([
                'name'      => $row[0],
                'teacher_id'=> $row[1],
                'address'   => $row[2],
                'city'      => $row[3],
                'birth_date'=> $row[4],
                'phone'     => $row[5],
                'course_id' => $row[6],
                'grade_id'  => $row[7],
                'in_date'   => $row[8]
            ]);
        }
    }
}
