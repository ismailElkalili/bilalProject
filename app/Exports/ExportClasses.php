<?php

namespace App\Exports;

use App\Models\Classes;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportClasses implements FromCollection
{
    protected $_param;

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {

        return Classes::join('students', 'classes.id', '=', 'students.class_id')
            ->select(
                'classes.name',
                'students.name as std_name',
                'students.nation_id',
                'students.date_of_birth',
                'students.phone_number',
                'students.address',
                'students.whatsapp_number',
                'students.father_job',
                'students.nationality')
            ->get();

    }
}
