<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Order;

class UserOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
             // ===== JANUARY =====
            ['name' => 'Tanchuling', 'address' => 'Camalig, Albay'],
            ['name' => 'Mr. Lee', 'address' => 'Cebu'],
            ['name' => 'Corazon N. Deanon', 'address' => 'Las Pinas City', 'phone' => '09088918952'],
            ['name' => 'Malou Noble Sevilla', 'address' => 'Metro Manila'],
            ['name' => 'Jessa Marquez Fajjardo', 'address' => 'Cebu City'],
            ['name' => 'Doc Toto Braganza', 'address' => 'Las Vegas USA/ Daraga Albay'],
            ['name' => 'Christian Joy Velasco', 'address' => 'Taguig City'],
            ['name' => 'Atty. Jemarie Tablate', 'address' => 'Quezon City'],
            ['name' => 'Karen Baldo', 'address' => 'Quezon City'],
            ['name' => 'Stella Guilatco', 'address' => 'Quezon City'],
            ['name' => 'Shalom Vejerano', 'address' => 'Dasmarinas Cavite'],
            ['name' => 'Janeth C. Guiriba', 'address' => 'Dasmarinas Cavite'],
            ['name' => 'Ailyn Ramirez', 'address' => 'Linao Libon Albay'],
            ['name' => 'Ma. Esther Vibal', 'address' => 'Brgy.5, Camalig Albay'],
            ['name' => 'Kate Orense', 'address' => 'Manila'],
            ['name' => 'Love Matocinios', 'address' => 'Manila'],
            ['name' => 'Dory Gonzales', 'address' => 'Manila'],
            ['name' => 'Mike Umali', 'address' => 'Manila'],
            ['name' => 'Mily Bemosa', 'address' => 'Manila'],
            ['name' => 'Mila Nolla', 'address' => 'Laguna'],
            ['name' => 'Vicky Morelos', 'address' => 'Cavite'],
            ['name' => 'Mary Laparan', 'address' => 'Manila'],

            // ===== FEBRUARY =====
            ['name' => 'Tanchuling', 'address' => 'Camalig, Albay'],
            ['name' => 'Christian Joy Velasco', 'address' => 'Taguig City'],
            ['name' => 'Atty. Jemarie Tablate', 'address' => 'Quezon City'],
            ['name' => 'Karen Baldo', 'address' => 'Quezon City'],
            ['name' => 'Stella Guilatco', 'address' => 'Quezon City'],
            ['name' => 'Shalom Vejerano', 'address' => 'Dasmarinas Cavite'],
            ['name' => 'Janeth C. Guiriba', 'address' => 'Dasmarinas Cavite'],
            ['name' => 'Ailyn Ramirez', 'address' => 'Linao Libon Albay'],
            ['name' => 'Love Matocinios', 'address' => 'Manila'],
            ['name' => 'Dory Gonzales', 'address' => 'Manila'],
            ['name' => 'Vicky Morelos', 'address' => 'Cavite'],
            ['name' => 'Nimfa Duran', 'address' => 'Legaspi'],
            ['name' => 'Carl Masbate', 'address' => 'Manila'],
            ['name' => 'Josie Orense', 'address' => 'Manila'],
            ['name' => 'Yolanda Mayor', 'address' => 'Manila'],
            ['name' => 'Marlenne Rihaya', 'address' => 'Manila'],
            ['name' => 'Jose Prieto', 'address' => 'Manila'],
            ['name' => 'Manolito Nipa', 'address' => 'Manila'],
            ['name' => 'Ley Batacan', 'address' => 'Manila'],
            ['name' => 'Jo Millete', 'address' => 'Manila'],
            ['name' => 'Ranel Ritual', 'address' => 'Manila'],

        ];

        foreach ($users as $index => $user) {
            User::create([
                'name' => $user['name'],
                'role_id' => 2, // Customer role
                'email' => strtolower(str_replace(' ', '.', $user['name'])) . $index . '@example.com', // Unique email
                'phone' => $user['phone'] ?? '09' . rand(100000000, 999999999), // Random Philippine number format
                'password' => Hash::make('test1234'),
                'address' => $user['address'],
            ]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('orders')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $orders = [
            ['user_id' => 3, 'status' => 'delivered', 'payment_method' => 'cod', 'address' => 'Camalig, Albay', 'product_ids' => [1, 2], 'quantities' => [1 => 50, 2 => 50], 'created_at' => '2024-01-01 00:00:00', 'updated_at' => '2024-01-01 00:00:00'],
            ['user_id' => 4, 'status' => 'delivered', 'payment_method' => 'cod', 'address' => 'Cebu', 'product_ids' => [1, 2], 'quantities' => [1 => 150, 2 => 150], 'created_at' => '2024-01-02 00:00:00', 'updated_at' => '2024-01-03 00:00:00'],
            ['user_id' => 5, 'status' => 'delivered', 'payment_method' => 'cod', 'address' => 'Las Pinas City', 'product_ids' => [1, 2], 'quantities' => [1 => 150, 2 => 150], 'created_at' => '2024-01-02 00:00:00', 'updated_at' => '2024-01-05 00:00:00'],
            ['user_id' => 6, 'status' => 'delivered', 'payment_method' => 'cod', 'address' => 'Metro Manila', 'product_ids' => [1, 2], 'quantities' => [1 => 200, 2 => 100], 'created_at' => '2024-01-03 00:00:00', 'updated_at' => '2024-01-06 00:00:00'],
            ['user_id' => 7, 'status' => 'delivered', 'payment_method' => 'cod', 'address' => 'Cebu City', 'product_ids' => [1, 2], 'quantities' => [1 => 100, 2 => 100], 'created_at' => '2024-01-03 00:00:00', 'updated_at' => '2024-01-07 00:00:00'],
            ['user_id' => 8, 'status' => 'delivered', 'payment_method' => 'cod', 'address' => 'Las Vegas USA/ Daraga Albay', 'product_ids' => [1, 2], 'quantities' => [1 => 10, 2 => 10], 'created_at' => '2024-01-07 00:00:00', 'updated_at' => '2024-01-07 00:00:00'],
            ['user_id' => 9, 'status' => 'delivered', 'payment_method' => 'cod', 'address' => 'Taguig City', 'product_ids' => [1, 2], 'quantities' => [1 => 150, 2 => 150], 'created_at' => '2024-01-08 00:00:00', 'updated_at' => '2024-01-10 00:00:00'],
            ['user_id' => 10, 'status' => 'delivered', 'payment_method' => 'cod', 'address' => 'Quezon City', 'product_ids' => [1, 2], 'quantities' => [1 => 50, 2 => 30], 'created_at' => '2024-01-11 00:00:00', 'updated_at' => '2024-01-11 00:00:00'],
            ['user_id' => 11, 'status' => 'delivered', 'payment_method' => 'cod', 'address' => 'Quezon City', 'product_ids' => [1, 2], 'quantities' => [1 => 20, 2 => 60], 'created_at' => '2024-01-11 00:00:00', 'updated_at' => '2024-01-11 00:00:00'],
            ['user_id' => 12, 'status' => 'delivered', 'payment_method' => 'cod', 'address' => 'Quezon City', 'product_ids' => [1, 2], 'quantities' => [1 => 10, 2 => 10], 'created_at' => '2024-01-11 00:00:00', 'updated_at' => '2024-01-11 00:00:00'],
            ['user_id' => 13, 'status' => 'delivered', 'payment_method' => 'cod', 'address' => 'Dasmarinas Cavite', 'product_ids' => [1, 2], 'quantities' => [1 => 150, 2 => 150], 'created_at' => '2024-01-11 00:00:00', 'updated_at' => '2024-01-13 00:00:00'],
            ['user_id' => 14, 'status' => 'delivered', 'payment_method' => 'cod', 'address' => 'Dasmarinas Cavite', 'product_ids' => [1, 2], 'quantities' => [1 => 5, 2 => 15], 'created_at' => '2024-01-11 00:00:00', 'updated_at' => '2024-01-14 00:00:00'],
            ['user_id' => 15, 'status' => 'delivered', 'payment_method' => 'cod', 'address' => 'Linao Libon Albay', 'product_ids' => [1, 2], 'quantities' => [1 => 20, 2 => 5], 'created_at' => '2024-01-14 00:00:00', 'updated_at' => '2024-01-14 00:00:00'],
            ['user_id' => 16, 'status' => 'delivered', 'payment_method' => 'cod', 'address' => 'Brgy.5, Camalig Albay', 'product_ids' => [1, 2], 'quantities' => [1 => 5, 2 => 5], 'created_at' => '2024-01-14 00:00:00', 'updated_at' => '2024-01-14 00:00:00'],
            ['user_id' => 17, 'status' => 'delivered', 'payment_method' => 'cod', 'address' => 'Manila', 'product_ids' => [1, 2], 'quantities' => [1 => 50, 2 => 50], 'created_at' => '2024-01-14 00:00:00', 'updated_at' => '2024-01-14 00:00:00'],
            ['user_id' => 18, 'status' => 'delivered', 'payment_method' => 'cod', 'address' => 'Manila', 'product_ids' => [1, 2], 'quantities' => [1 => 100, 2 => 100], 'created_at' => '2024-01-15 00:00:00', 'updated_at' => '2024-01-30 00:00:00'],
            ['user_id' => 19, 'status' => 'delivered', 'payment_method' => 'cod', 'address' => 'Manila', 'product_ids' => [1, 2], 'quantities' => [1 => 100, 2 => 100], 'created_at' => '2024-01-16 00:00:00', 'updated_at' => '2024-01-30 00:00:00'],
            ['user_id' => 20, 'status' => 'delivered', 'payment_method' => 'cod', 'address' => 'Manila', 'product_ids' => [1, 2], 'quantities' => [1 => 100, 2 => 100], 'created_at' => '2024-01-20 00:00:00', 'updated_at' => '2024-01-30 00:00:00'],
            ['user_id' => 21, 'status' => 'delivered', 'payment_method' => 'cod', 'address' => 'Manila', 'product_ids' => [1, 2], 'quantities' => [1 => 100, 2 => 100], 'created_at' => '2024-01-20 00:00:00', 'updated_at' => '2024-01-30 00:00:00'],
            ['user_id' => 22, 'status' => 'delivered', 'payment_method' => 'cod', 'address' => 'Laguna', 'product_ids' => [1, 2], 'quantities' => [1 => 100, 2 => 100], 'created_at' => '2024-01-20 00:00:00', 'updated_at' => '2024-01-30 00:00:00'],
            ['user_id' => 23, 'status' => 'delivered', 'payment_method' => 'cod', 'address' => 'Cavite', 'product_ids' => [1, 2], 'quantities' => [1 => 100, 2 => 100], 'created_at' => '2024-01-21 00:00:00', 'updated_at' => '2024-01-31 00:00:00'],
            ['user_id' => 24, 'status' => 'delivered', 'payment_method' => 'cod', 'address' => 'Manila', 'product_ids' => [1, 2], 'quantities' => [1 => 45, 2 => 50], 'created_at' => '2024-01-20 00:00:00', 'updated_at' => '2024-01-31 00:00:00'],


            //===== FEBRUARY =====
            ['user_id' => 25, 'status' => 'delivered', 'payment_method' => 'cod', 'address' => 'Camalig, Albay', 'product_ids' => [1, 2], 'quantities' => [1 => 5, 2 => 5], 'created_at' => '2024-02-07 00:00:00', 'updated_at' => '2024-02-07 00:00:00'],
            ['user_id' => 26, 'status' => 'delivered', 'payment_method' => 'cod', 'address' => 'Taguig City', 'product_ids' => [1, 2], 'quantities' => [1 => 100, 2 => 100], 'created_at' => '2024-02-11 00:00:00', 'updated_at' => '2024-02-23 00:00:00'],
            ['user_id' => 27, 'status' => 'delivered', 'payment_method' => 'cod', 'address' => 'Quezon City', 'product_ids' => [1, 2], 'quantities' => [1 => 100, 2 => 100], 'created_at' => '2024-02-12 00:00:00', 'updated_at' => '2024-02-23 00:00:00'],
            ['user_id' => 28, 'status' => 'delivered', 'payment_method' => 'cod', 'address' => 'Quezon City', 'product_ids' => [1, 2], 'quantities' => [1 => 100, 2 => 100], 'created_at' => '2024-02-12 00:00:00', 'updated_at' => '2024-02-23 00:00:00'],
            ['user_id' => 29, 'status' => 'delivered', 'payment_method' => 'cod', 'address' => 'Quezon City', 'product_ids' => [1, 2], 'quantities' => [1 => 100, 2 => 100], 'created_at' => '2024-02-12 00:00:00', 'updated_at' => '2024-02-23 00:00:00'],
            ['user_id' => 30, 'status' => 'delivered', 'payment_method' => 'cod', 'address' => 'Dasmarinas Cavite', 'product_ids' => [1, 2], 'quantities' => [1 => 100, 2 => 100], 'created_at' => '2024-02-12 00:00:00', 'updated_at' => '2024-02-23 00:00:00'],
            ['user_id' => 31, 'status' => 'delivered', 'payment_method' => 'cod', 'address' => 'Dasmarinas Cavite', 'product_ids' => [1, 2], 'quantities' => [1 => 150, 2 => 150], 'created_at' => '2024-02-13 00:00:00', 'updated_at' => '2024-02-23 00:00:00'],
            ['user_id' => 32, 'status' => 'delivered', 'payment_method' => 'cod', 'address' => 'Linao Libon Albay', 'product_ids' => [1, 2], 'quantities' => [1 => 150, 2 => 150], 'created_at' => '2024-02-13 00:00:00', 'updated_at' => '2024-02-23 00:00:00'],
            ['user_id' => 33, 'status' => 'delivered', 'payment_method' => 'cod', 'address' => 'Manila', 'product_ids' => [1, 2], 'quantities' => [1 => 90, 2 => 90], 'created_at' => '2024-02-09 00:00:00', 'updated_at' => '2024-10-01 00:00:00'],
            ['user_id' => 34, 'status' => 'delivered', 'payment_method' => 'cod', 'address' => 'Manila', 'product_ids' => [1, 2], 'quantities' => [1 => 300, 2 => 300], 'created_at' => '2024-02-01 00:00:00', 'updated_at' => '2024-05-02 00:00:00'],
            ['user_id' => 35, 'status' => 'delivered', 'payment_method' => 'cod', 'address' => 'Cavite', 'product_ids' => [1, 2], 'quantities' => [1 => 50, 2 => 50], 'created_at' => '2024-02-05 00:00:00', 'updated_at' => '2024-06-02 00:00:00'],
            ['user_id' => 36, 'status' => 'delivered', 'payment_method' => 'cod', 'address' => 'Legaspi', 'product_ids' => [1, 2], 'quantities' => [1 => 50, 2 => 50], 'created_at' => '2024-02-06 00:00:00', 'updated_at' => '2024-02-06 00:00:00'],
            ['user_id' => 37, 'status' => 'delivered', 'payment_method' => 'cod', 'address' => 'Manila', 'product_ids' => [1, 2], 'quantities' => [1 => 100, 2 => 100], 'created_at' => '2024-02-23 00:00:00', 'updated_at' => '2024-02-28 00:00:00'],
            ['user_id' => 38, 'status' => 'delivered', 'payment_method' => 'cod', 'address' => 'Manila', 'product_ids' => [1, 2], 'quantities' => [1 => 50, 2 => 50], 'created_at' => '2024-02-24 00:00:00', 'updated_at' => '2024-02-28 00:00:00'],
            ['user_id' => 39, 'status' => 'delivered', 'payment_method' => 'cod', 'address' => 'Manila', 'product_ids' => [1, 2], 'quantities' => [1 => 50, 2 => 50], 'created_at' => '2024-02-24 00:00:00', 'updated_at' => '2024-02-28 00:00:00'],
            ['user_id' => 40, 'status' => 'delivered', 'payment_method' => 'cod', 'address' => 'Manila', 'product_ids' => [1, 2], 'quantities' => [1 => 50, 2 => 50], 'created_at' => '2024-02-25 00:00:00', 'updated_at' => '2024-02-28 00:00:00'],
            ['user_id' => 41, 'status' => 'delivered', 'payment_method' => 'cod', 'address' => 'Manila', 'product_ids' => [1, 2], 'quantities' => [1 => 50, 2 => 50], 'created_at' => '2024-02-25 00:00:00', 'updated_at' => '2024-02-28 00:00:00'],
            ['user_id' => 42, 'status' => 'delivered', 'payment_method' => 'cod', 'address' => 'Manila', 'product_ids' => [1, 2], 'quantities' => [1 => 50, 2 => 50], 'created_at' => '2024-02-26 00:00:00', 'updated_at' => '2024-02-28 00:00:00'],
            ['user_id' => 43, 'status' => 'delivered', 'payment_method' => 'cod', 'address' => 'Manila', 'product_ids' => [1, 2], 'quantities' => [1 => 50, 2 => 50], 'created_at' => '2024-02-26 00:00:00', 'updated_at' => '2024-02-29 00:00:00'],
            ['user_id' => 44, 'status' => 'delivered', 'payment_method' => 'cod', 'address' => 'Manila', 'product_ids' => [1, 2], 'quantities' => [1 => 30, 2 => 30], 'created_at' => '2024-02-26 00:00:00', 'updated_at' => '2024-02-29 00:00:00'],
            ['user_id' => 45, 'status' => 'delivered', 'payment_method' => 'cod', 'address' => 'Manila', 'product_ids' => [1, 2], 'quantities' => [1 => 150, 2 => 150], 'created_at' => '2024-02-06 00:00:00', 'updated_at' => '2024-02-09 00:00:00'],
        ];

        foreach ($orders as $orderData) {
            $order = new Order();
            $order->user_id = $orderData['user_id'];
            $order->status = $orderData['status'];
            $order->payment_method = $orderData['payment_method'];
            $order->address = $orderData['address'];

            $totalAmount = 0;
            $productQuantities = [];

            foreach ($orderData['product_ids'] as $productId) {
                $product = Product::find($productId);
                $quantity = $orderData['quantities'][$productId];
                $totalAmount += $product->price * $quantity;
                $productQuantities[$productId] = ['quantity' => $quantity];
            }

            $order->total_amount = $totalAmount;
            $order->created_at = $orderData['created_at'];
            $order->updated_at = $orderData['updated_at'];
            $order->save();

            $order->products()->attach($productQuantities);
        }

    }
}
