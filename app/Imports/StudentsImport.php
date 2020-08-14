<?php

namespace App\Imports;

use App\StudentsModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\Importable;
use Illuminate\Validation\Rule;

class StudentsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if(!StudentsModel::where('student_id', '=', $row[1])->exists()) {
            return new StudentsModel([
                'name'          => $row[0],
                'student_id'    => $row[1],
                'address'       => $row[2],
                'city'          => $row[3],
                'birth_date'    => $row[4],
                'phone'         => $row[5],
                'grade_id'      => $row[6],
                'major_id'      => $row[7],
                'classroom'     => $row[8],
                'enroll_year'   => $row[9]
            ]);
        }
    }
}
