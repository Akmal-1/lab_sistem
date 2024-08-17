<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Tambahkan role sesuai kebutuhan
        Role::create(['name' => 'admin_lab']); 
        Role::create(['name' => 'operator_lab']);
        Role::create(['name' => 'foreman_lab']);
        Role::create(['name' => 'supervisor_lab']);
        Role::create(['name' => 'manager_lab']);
        Role::create(['name' => 'gm_lab']);
        Role::create(['name' => 'quality_control']);
        Role::create(['name' => 'internal_customer']);
    }
}
