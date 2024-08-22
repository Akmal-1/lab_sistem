<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Tambahkan role sesuai kebutuhan
        Role::create(['name' => 'Admin Lab']); 
        Role::create(['name' => 'Analist']);
        Role::create(['name' => 'Foreman Lab']);
        Role::create(['name' => 'Supervisor Lab']);
        Role::create(['name' => 'Manager']);
        Role::create(['name' => 'General Manager']);
        Role::create(['name' => 'Quality Control']);
        Role::create(['name' => 'Internal Customer']);
        Role::create(['name' => 'Guest']);
    }
}
