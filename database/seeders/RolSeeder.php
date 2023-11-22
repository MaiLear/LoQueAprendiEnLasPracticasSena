<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['guard_name' => 'admin','name' => 'Admin', ]);
       $role2 =  Role::create(['guard_name' => 'customer','name' => 'Customer']);
       $role3 =  Role::create(['guard_name' => 'admin','name' => 'SuperAdmin']);

        Permission::create(['guard_name' => 'admin','name' => 'admin.login', 'description' => 'Mirar el login'])->assignRole($role1);


        Permission::create(['guard_name' => 'customer','name' => 'admin.destroy', 'description' => 'Destruir todo'])->assignRole($role2);

        Permission::create(['guard_name' => 'admin','name' => 'verTodo', 'description' => 'Verlo todo'])->assignRole($role3);
    } 
}
