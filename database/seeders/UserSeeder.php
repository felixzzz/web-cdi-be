<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create([
            'name' => 'Super Admin',
            'is_superadmin' => 1
        ]);

        User::create([
            'name' => 'Superadmin',
            'email' => 'portal@admin.com',
            'password' => Hash::make("P@ssw0rd"),
            'status' => 1,
            'role_id' => $role->id,
            'profile' => asset('assets/images/avatar.jpg')
        ]);
    }
}
