<?php

namespace App\Imports;

use App\Models\Teacher;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TeachersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Teacher([
            'name' => $row['name'],
            'index' => $row['index'],
            'position' => $row['position'],
            'department' => $row['department'],
            'subject' => $row['subject'],
            'gender' => $row['gender'],
            'phone' => $row['phone'],
            'email' => $row['email'],
        ]);
    }
}
