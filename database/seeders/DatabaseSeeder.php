<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesSeeder::class,
            UserSeeder::class,
            ProductSeeder::class,
            MaterialSeeder::class,
            UserOrderSeeder::class,
            ContactSeeder::class,
            RespondentsSeeder::class,
        ]);
    }
}