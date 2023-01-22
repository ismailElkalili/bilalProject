<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            'name' => 'Ismail',
            'nation_id' => '120221408',
            'phone_number' => '0598147023',
            'date_of_birth' => '1999-10-10',
            'whatsapp_number' => '0598147023',
            'address' => 'Gaza',
            'father_job' => 'IT',
            'nationality' => 'Gazaz',
            'dapartment_id' => '1',
            'class_id' => '1',
            'state' => '0'
        ]);
    }
}
