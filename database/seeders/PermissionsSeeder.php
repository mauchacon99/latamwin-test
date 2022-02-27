<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // permissions table for users
        Permission::create(['name' => 'user.edit']);
        Permission::create(['name' => 'user.create']);
        Permission::create(['name' => 'user.remove']);
        Permission::create(['name' => 'user.update']);
        // permissions for roles
        Permission::create(['name' => 'roles.edit']);
        Permission::create(['name' => 'roles.create']);
        Permission::create(['name' => 'roles.remove']);
        Permission::create(['name' => 'roles.update']);
    }
}
