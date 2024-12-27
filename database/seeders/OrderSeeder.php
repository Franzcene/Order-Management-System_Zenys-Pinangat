<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('orders')->truncate();

        $orders = [
            [
                'user_id' => 1,
                'status' => 'pending',
                'payment_method' => 'credit_card',
                'address' => '123 Main St',
                'product_ids' => [1, 2],
                'quantities' => [1 => 2, 2 => 1],
            ],
            [
                'user_id' => 2,
                'status' => 'completed',
                'payment_method' => 'paypal',
                'address' => '456 Elm St',
                'product_ids' => [1],
                'quantities' => [1 => 1],
            ],
            [
                'user_id' => 3,
                'status' => 'shipped',
                'payment_method' => 'bank_transfer',
                'address' => '789 Oak St',
                'product_ids' => [2],
                'quantities' => [2 => 3],
            ],
            [
                'user_id' => 4,
                'status' => 'processing',
                'payment_method' => 'credit_card',
                'address' => '101 Pine St',
                'product_ids' => [1, 2],
                'quantities' => [1 => 1, 2 => 2],
            ],
            [
                'user_id' => 5,
                'status' => 'cancelled',
                'payment_method' => 'paypal',
                'address' => '202 Maple St',
                'product_ids' => [2],
                'quantities' => [2 => 1],
            ],
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
            $order->save();

            $order->products()->attach($productQuantities);
        }
    }
}
