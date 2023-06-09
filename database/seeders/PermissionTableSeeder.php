<?php

namespace Database\Seeders;

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
        $data = [
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'permission-list',
            'permission-create',
            'permission-edit',
            'permission-delete',
            'course-list',
            'course-create',
            'course-edit',
            'course-delete',
            'student-list',
            'student-create',
            'student-edit',
            'student-delete',
            

        ];

        foreach ($data as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
