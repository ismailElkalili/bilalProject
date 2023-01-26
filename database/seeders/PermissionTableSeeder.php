<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'teacher-list',
            'teacher-create',
            'teacher-edit',
            'teacher-delete',
            'student-list',
            'student-create',
            'student-edit',
            'student-delete',
            'classes-list',
            'classes-create',
            'classes-edit',
            'classes-delete',
            'department-list',
            'department-create',
            'department-edit',
            'department-delete',
            'committee-list',
            'committee-create',
            'committee-edit',
            'committee-delete'
            
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}