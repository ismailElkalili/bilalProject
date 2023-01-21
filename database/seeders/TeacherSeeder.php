<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers')->insert([
            'name' => 'Ismail',
            'nation_id' => '120221408',
            'phone_number' => '0598147023',
            'date_of_birth' => '1999-10-10',
            'whatsapp_number' => '0598147023',
            'specialization' => 'IT',
            'qualification' => 'Bachelor',
        ]);
        DB::table('teachers')->insert([
            'name' => 'Mostafe',
            'phone_number' => '0594564221',
            'nation_id' => '120221408',
            'date_of_birth' => '1999-03-10',
            'whatsapp_number' => '0594564221',
            'qualification' => 'Bachelor',
            'specialization' => 'IT Man',
        ]);
        DB::table('teachers')->insert([
            'name' => 'Ismail',
            'phone_number' => '0598147023',
            'nation_id' => '120221408',
            'date_of_birth' => '1999-12-12',
            'whatsapp_number' => '0598147023',
            'qualification' => 'Bachelor',
            'specialization' => 'Man IT',
        ]);
    }
}
