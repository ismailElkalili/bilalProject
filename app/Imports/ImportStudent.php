<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Carbon\Carbon;
class ImportStudent implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // $time = strtotime($row[2]);
        // $newformat = date('Y-m-d', $row[2]);
        // dd(Carbon::instance(Date::excelToDateTimeObject($row[2])));
      
        return new Student([
            'name' => $row[0]??'',
            'nation_id' => $row[1]??0,
            'date_of_birth' => isset($row[2])?Date::excelToDateTimeObject($row[2])->format('Y-m-d'):'2023-01-24',
            'phone_number' => $row[3]??0,
            'whatsapp_number' => $row[4]??0,
            'father_job' => $row[5]??'',
            'address' => $row[6]??'',
            'nationality' => $row[7]??'',
        ]);

    }
}
