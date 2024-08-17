<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            'admin_lab' => [
                ['name' => 'Admin Lab', 'email' => 'admin@lab.com']
            ],
            'operator_lab' => [
                ['name' => 'Operator 1', 'email' => 'operator1@lab.com'],
                ['name' => 'Operator 2', 'email' => 'operator2@lab.com']
            ],
            'foreman_lab' => [
                ['name' => 'Foreman Lab', 'email' => 'foreman@lab.com']
            ],
            'supervisor_lab' => [
                ['name' => 'Supervisor Lab', 'email' => 'supervisor@lab.com']
            ],
            'manager_lab' => [
                ['name' => 'Manager Lab', 'email' => 'manager@lab.com']
            ],
            'gm_lab' => [
                ['name' => 'GM Lab', 'email' => 'gm@lab.com']
            ],
            'quality_control' => [
                ['name' => 'Quality Control 1', 'email' => 'qc1@lab.com'],
                ['name' => 'Quality Control 2', 'email' => 'qc2@lab.com']
            ],
            'internal_customer' => [
                ['name' => 'Internal Customer 1', 'email' => 'customer1@lab.com'],
                ['name' => 'Internal Customer 2', 'email' => 'customer2@lab.com']
            ]
        ];

        foreach ($roles as $roleName => $users) {
            $role = Role::where('name', $roleName)->first();

            foreach ($users as $userData) {
                $user = User::create([
                    'name' => $userData['name'],
                    'email' => $userData['email'],
                    'password' => bcrypt('password'),
                ]);
                $user->roles()->attach($role);
            }
        }
    }
}
