<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Student([
            'st_id' => $row['st_id'],
            'name' => $row['name'],
            'session' => $row['session'],
            'department' => $row['department'],
            'c_class' => $row['c_class'],
            'dob' => $row['dob'],
            'gender' => $row['gender'],
            'phone' => $row['phone'],
            'email' => $row['email'],
        ]);
    }
}
