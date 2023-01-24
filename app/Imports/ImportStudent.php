<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportStudent implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Student([
            'name' => $row[0],
            'nation_id' => $row[1],
            'date_of_birth' => $row[2],
            'phone_number' => $row[3],
            'whatsapp_number' => $row[4],
            'father_job' => $row[5],
            'address' => $row[6],
            'nationality' => $row[7],
        ]);

    }
}
