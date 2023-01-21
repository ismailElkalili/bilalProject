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
            'phone' => '0598147023',
            'date_of_birth' => '1999-10-10',
            'whatsapp' => '0598147023',
            'specialization' => 'IT',
            'qualification' => 'Bachelor',
        ]);
        DB::table('teachers')->insert([
            'name' => 'Mostafe',
            'phone' => '0594564221',
            'date_of_birth' => '1999-03-10',
            'whatsapp' => '0594564221',
            'qualification' => 'Bachelor',
            'specialization' => 'IT Man',
        ]);
        DB::table('teachers')->insert([
            'name' => 'Ismail',
            'phone' => '0598147023',
            'date_of_birth' => '1999-12-12',
            'whatsapp' => '0598147023',
            'qualification' => 'Bachelor',
            'specialization' => 'Man IT',
        ]);
    }
}
