<?php

namespace App\Exports;

use App\Models\Classes;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Http\Request;

class ExportClass implements FromCollection
{
    protected $_param;

    public function __construct(Request $paramFromRoute)
    {
        $this->_param = $paramFromRoute;
    }


    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $idClass = mb_substr($this->_param->getPathInfo(), -1);

        return Classes::join('students', 'classes.id', '=', 'students.class_id')
            ->where('students.class_id', $idClass)
            ->where('students.state', '=','0')
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
