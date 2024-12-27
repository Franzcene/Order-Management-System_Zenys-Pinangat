<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        DB::table('products')->insert([
            [
                'name' => 'Classic Pinangat',
                'description' => 'Classic Pinangat is a classic Bicolano dish made from taro leaves, coconut milk, and chili.',
                'price' => 50,
                'quantity' => 100,
                'image' => 'classic-pinangat.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Spicy Pinangat',
                'description' => 'Spicy Pinangat is a spicier version of the classic Bicolano dish made from taro leaves, coconut milk, and chili.',
                'price' => 55,
                'quantity' => 100,
                'image' => 'spicy-pinangat.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
