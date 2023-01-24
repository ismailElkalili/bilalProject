<?php

namespace App\Imports;

use App\Models\Teacher;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportTeacher implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Teacher([
            'name' => $row[0],
            'date_of_birth' => $row[1],
            'phone_number' => $row[2],
            'whatsapp_number' => $row[3],
            'nation_id' => $row[4],
            'specialization' => $row[5],
            'qualification' => $row[6],
            'committees_id' => $row[7],
        ]);
    }
}
