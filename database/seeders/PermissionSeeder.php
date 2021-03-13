<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'view-course']);
        Permission::create(['name' => 'create-course']);
        Permission::create(['name' => 'update-course']);
        Permission::create(['name' => 'delete-course']);

        Permission::create(['name' => 'view-dashboard']);

        Permission::create(['name' => 'create-role']);
        Permission::create(['name' => 'view-role']);
        Permission::create(['name' => 'update-role']);
        Permission::create(['name' => 'delete-role']);

        Permission::create(['name' => 'view-users']);
        Permission::create(['name' => 'update-users']);

    }
}
