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
            'state' => $row[1],
            'dapartment_id' => $row[2],
            'class_id' => $row[3],
            'nation_id' => $row[4],
            'date_of_birth' => $row[5],
            'phone_number' => $row[6],
            'address' => $row[7],
            'whatsapp_number' => $row[8],
            'father_job' => $row[9],
            'nationality' => $row[10],
        ]);

    }
}
