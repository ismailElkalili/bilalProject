<?php

namespace App\Exports;

use App\Models\Teacher;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportTeacher implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Teacher::select('name','date_of_birth','phone_number','whatsapp_number','nation_id','specialization','qualification')->get();
    }
}
