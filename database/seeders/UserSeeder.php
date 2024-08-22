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
            'Admin Lab' => [
                ['name' => 'Admin Lab', 'email' => 'admin@lab.com']
            ],
            'Analist' => [
                ['name' => 'Renal', 'email' => 'renal@lab.com'],
                ['name' => 'Alpian', 'email' => 'alpian@lab.com']
            ],
            'Foreman Lab' => [
                ['name' => 'Akmal', 'email' => 'akmal@lab.com']
            ],
            'Supervisor Lab' => [
                ['name' => 'Selfira', 'email' => 'selfira@lab.com']
            ],
            'Manager' => [
                ['name' => 'Arian reza', 'email' => 'arian.reza@lab.com']
            ],
            'General Manager' => [
                ['name' => 'Andri', 'email' => 'andri@lab.com']
            ],
            'Quality Control' => [
                ['name' => 'Nikmat', 'email' => 'nikmat@lab.com'],
                ['name' => 'Rudi', 'email' => 'rudi@lab.com']
            ],
            'Internal Customer' => [
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
