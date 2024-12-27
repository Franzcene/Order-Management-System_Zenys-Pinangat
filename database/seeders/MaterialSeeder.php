<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('materials')->insert([
            ['name' => 'Coconut', 'unit' => 'pcs', 'unit_cost' => 12, 'quantity' => 2070, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Garlic', 'unit' => 'kilo', 'unit_cost' => 120, 'quantity' => 23, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ginger', 'unit' => '1/4 kilo', 'unit_cost' => 37.5, 'quantity' => 23, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Salt', 'unit' => '1/2 kilo', 'unit_cost' => 15, 'quantity' => 23, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Young Coconut Leaves', 'unit' => 'bundle', 'unit_cost' => 25, 'quantity' => 23, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Plastic (Red/White)', 'unit' => 'bundle', 'unit_cost' => 115, 'quantity' => 26, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Foil', 'unit' => 'bundle', 'unit_cost' => 600, 'quantity' => 9, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Taro Leaves', 'unit' => 'kilo', 'unit_cost' => 60, 'quantity' => 345, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sili', 'unit' => 'kilo', 'unit_cost' => 150, 'quantity' => 9, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Shrimp Paste', 'unit' => 'kilo', 'unit_cost' => 90, 'quantity' => 9, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Black Pepper', 'unit' => 'kilo', 'unit_cost' => 50, 'quantity' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Smoked Fish', 'unit' => 'kilo', 'unit_cost' => 120, 'quantity' => 9, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Meat', 'unit' => 'kilo', 'unit_cost' => 280, 'quantity' => 23, 'created_at' => now(), 'updated_at' => now()],

            ['name' => 'Coconut', 'unit' => 'pcs', 'unit_cost' => 12, 'quantity' => 2070, 'created_at' => '2024-01-01 00:00:00', 'updated_at' => '2024-01-01 00:00:00'],
            ['name' => 'Garlic', 'unit' => 'kilo', 'unit_cost' => 120, 'quantity' => 23, 'created_at' => '2024-01-01 00:00:00', 'updated_at' => '2024-01-01 00:00:00'],
            ['name' => 'Ginger', 'unit' => '1/4 kilo', 'unit_cost' => 37.5, 'quantity' => 23, 'created_at' => '2024-01-01 00:00:00', 'updated_at' => '2024-01-01 00:00:00'],
            ['name' => 'Salt', 'unit' => '1/2 kilo', 'unit_cost' => 15, 'quantity' => 23, 'created_at' => '2024-01-01 00:00:00', 'updated_at' => '2024-01-01 00:00:00'],
            ['name' => 'Young Coconut Leaves', 'unit' => 'bundle', 'unit_cost' => 25, 'quantity' => 23, 'created_at' => '2024-01-01 00:00:00', 'updated_at' => '2024-01-01 00:00:00'],
            ['name' => 'Plastic (Red/White)', 'unit' => 'bundle', 'unit_cost' => 115, 'quantity' => 26, 'created_at' => '2024-01-01 00:00:00', 'updated_at' => '2024-01-01 00:00:00'],
            ['name' => 'Foil', 'unit' => 'bundle', 'unit_cost' => 600, 'quantity' => 9, 'created_at' => '2024-01-01 00:00:00', 'updated_at' => '2024-01-01 00:00:00'],
            ['name' => 'Taro Leaves', 'unit' => 'kilo', 'unit_cost' => 60, 'quantity' => 345, 'created_at' => '2024-01-01 00:00:00', 'updated_at' => '2024-01-01 00:00:00'],
            ['name' => 'Sili', 'unit' => 'kilo', 'unit_cost' => 150, 'quantity' => 9, 'created_at' => '2024-01-01 00:00:00', 'updated_at' => '2024-01-01 00:00:00'],
            ['name' => 'Shrimp Paste', 'unit' => 'kilo', 'unit_cost' => 90, 'quantity' => 9, 'created_at' => '2024-01-01 00:00:00', 'updated_at' => '2024-01-01 00:00:00'],
            ['name' => 'Black Pepper', 'unit' => 'kilo', 'unit_cost' => 50, 'quantity' => 6, 'created_at' => '2024-01-01 00:00:00', 'updated_at' => '2024-01-01 00:00:00'],
            ['name' => 'Smoked Fish', 'unit' => 'kilo', 'unit_cost' => 120, 'quantity' => 9, 'created_at' => '2024-01-01 00:00:00', 'updated_at' => '2024-01-01 00:00:00'],
            ['name' => 'Meat', 'unit' => 'kilo', 'unit_cost' => 280, 'quantity' => 23, 'created_at' => '2024-01-01 00:00:00', 'updated_at' => '2024-01-01 00:00:00'],

            ['name' => 'Coconut', 'unit' => 'pcs', 'unit_cost' => 12, 'quantity' => 2070, 'created_at' => '2024-02-01 00:00:00', 'updated_at' => '2024-02-01 00:00:00'],
            ['name' => 'Garlic', 'unit' => 'kilo', 'unit_cost' => 120, 'quantity' => 23, 'created_at' => '2024-02-01 00:00:00', 'updated_at' => '2024-02-01 00:00:00'],
            ['name' => 'Ginger', 'unit' => '1/4 kilo', 'unit_cost' => 37.5, 'quantity' => 23, 'created_at' => '2024-02-01 00:00:00', 'updated_at' => '2024-02-01 00:00:00'],
            ['name' => 'Salt', 'unit' => '1/2 kilo', 'unit_cost' => 15, 'quantity' => 23, 'created_at' => '2024-02-01 00:00:00', 'updated_at' => '2024-02-01 00:00:00'],
            ['name' => 'Young Coconut Leaves', 'unit' => 'bundle', 'unit_cost' => 25, 'quantity' => 23, 'created_at' => '2024-02-01 00:00:00', 'updated_at' => '2024-02-01 00:00:00'],
            ['name' => 'Plastic (Red/White)', 'unit' => 'bundle', 'unit_cost' => 115, 'quantity' => 26, 'created_at' => '2024-02-01 00:00:00', 'updated_at' => '2024-02-01 00:00:00'],
            ['name' => 'Foil', 'unit' => 'bundle', 'unit_cost' => 600, 'quantity' => 9, 'created_at' => '2024-02-01 00:00:00', 'updated_at' => '2024-02-01 00:00:00'],
            ['name' => 'Taro Leaves', 'unit' => 'kilo', 'unit_cost' => 60, 'quantity' => 345, 'created_at' => '2024-02-01 00:00:00', 'updated_at' => '2024-02-01 00:00:00'],
            ['name' => 'Sili', 'unit' => 'kilo', 'unit_cost' => 150, 'quantity' => 9, 'created_at' => '2024-02-01 00:00:00', 'updated_at' => '2024-02-01 00:00:00'],
            ['name' => 'Shrimp Paste', 'unit' => 'kilo', 'unit_cost' => 90, 'quantity' => 9, 'created_at' => '2024-02-01 00:00:00', 'updated_at' => '2024-02-01 00:00:00'],
            ['name' => 'Black Pepper', 'unit' => 'kilo', 'unit_cost' => 50, 'quantity' => 6, 'created_at' => '2024-02-01 00:00:00', 'updated_at' => '2024-02-01 00:00:00'],
            ['name' => 'Smoked Fish', 'unit' => 'kilo', 'unit_cost' => 120, 'quantity' => 9, 'created_at' => '2024-02-01 00:00:00', 'updated_at' => '2024-02-01 00:00:00'],
            ['name' => 'Meat', 'unit' => 'kilo', 'unit_cost' => 280, 'quantity' => 23, 'created_at' => '2024-02-01 00:00:00', 'updated_at' => '2024-02-01 00:00:00'],
        ]);
    }
}
