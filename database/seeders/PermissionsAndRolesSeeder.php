<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\{Role, Permission};

 
class PermissionsAndRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin = Role::create(['name' => 'admin']);
        // Permissions module user
        Permission::create(['name' => 'user.index'])->assignRole($admin);
        Permission::create(['name' => 'user.edit'])->assignRole($admin);
        Permission::create(['name' => 'user.create'])->assignRole($admin);
        Permission::create(['name' => 'user.delete'])->assignRole($admin);
        Permission::create(['name' => 'user.update-role'])->assignRole($admin);
        // Permissions module roles
        Permission::create(['name' => 'roles.index'])->assignRole($admin);
        Permission::create(['name' => 'roles.edit'])->assignRole($admin);
        Permission::create(['name' => 'roles.create'])->assignRole($admin);
        Permission::create(['name' => 'roles.delete'])->assignRole($admin);
        Permission::create(['name' => 'roles.permissions'])->assignRole($admin);
    }
}
