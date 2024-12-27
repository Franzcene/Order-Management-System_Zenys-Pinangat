<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create an admin user
        User::create([
            'name' => 'admin',
            'role_id' => 1,
            'email' => 'admin@user.com',
            'phone' => null,
            'password' => Hash::make('admin1234'),
            'address' => 'none',
        ]);

        // Create a customer user
        User::create([
            'name' => 'customer',
            'role_id' => 2,
            'email' => 'customer@user.com',
            'phone' => null,
            'password' => Hash::make('test1234'),
            'address' => 'none',
        ]);
    }
}
