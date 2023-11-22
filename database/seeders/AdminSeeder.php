<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin::create([
        //     'first_name' => 'Admin',
        //     'second_name' => 'prueba',
        //     'email' => 'superadmin@gmail.com',
        //     'password' => bcrypt('12345678'),
        // ])->assignRole('SuperAdmin');

        Admin::create([
            'first_name' => 'Admin',
            'second_name' => 'prueba',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('Admin');

    
    }
}
