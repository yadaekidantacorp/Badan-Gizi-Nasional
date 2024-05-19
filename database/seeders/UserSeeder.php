<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Ministry;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = [
            [
                'name' => 'Super User',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Super Admin',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Admin',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Staff',
                'guard_name' => 'web'
            ]
        ];
        foreach ($role as $roleData) {
            Role::create($roleData);
        }
        $users = [
            [
                'name' => 'Super User',
                'username' => 'super_user',
                'email' => 'su@email.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'role_id' => 1
            ],
            [
                'name' => 'Tim Asistensi',
                'username' => 'tim_asistensi',
                'email' => 'asistensi@email.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'role_id' => 2
            ]
        ];
        foreach ($users as $userData) {
            User::create($userData);
        }
        $ministry = Ministry::get();
        foreach($ministry as $ministryData) {
            User::create([
                'name' => 'Admin '.$ministryData->name,
                'username' => 'admin_'.$ministryData->slug,
                'email' => $ministryData->slug . '@email.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'role_id' => 3,
                'ministry_id' => $ministryData->id,
                'position_id' => 1,
            ]);
        }
    }
}
