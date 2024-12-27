<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run()
    {
        $data = [
            ['name' => 'Tanchuling', 'email' => 'tanchuling@example.com', 'subject' => 'Inquiry about Zenys Pinangat', 'message' => 'I would like to know more about your Pinangat and how I can place an order.', 'created_at' => '2024-09-07 00:00:00', 'updated_at' => '2024-09-07 00:00:00'],
            ['name' => 'Christian Joy Velasco', 'email' => 'christian.joy@example.com', 'subject' => 'Pinangat Delivery Question', 'message' => 'Can I get Zenys Pinangat delivered to my area?', 'created_at' => '2024-09-11 00:00:00', 'updated_at' => '2024-09-11 00:00:00'],
            ['name' => 'Atty. Jemarie Tablate', 'email' => 'jemarie.tablate@example.com', 'subject' => 'Pinangat Variants', 'message' => 'Do you offer different variants of Zenys Pinangat?', 'created_at' => '2024-09-12 00:00:00', 'updated_at' => '2024-09-12 00:00:00'],
            ['name' => 'Karen Baldo', 'email' => 'karen.baldo@example.com', 'subject' => 'Pinangat Ingredients', 'message' => 'What ingredients do you use in Zenys Pinangat?', 'created_at' => '2024-09-12 00:00:00', 'updated_at' => '2024-09-12 00:00:00'],
            ['name' => 'Stella Guilatco', 'email' => 'stella.guilatco@example.com', 'subject' => 'Zenys Pinangat Availability', 'message' => 'Is Zenys Pinangat available year-round or only in specific seasons?', 'created_at' => '2024-09-12 00:00:00', 'updated_at' => '2024-09-12 00:00:00'],
            ['name' => 'Shalom Vejerano', 'email' => 'shalom.vejerano@example.com', 'subject' => 'Order for Zenys Pinangat', 'message' => 'How can I place an order for Zenys Pinangat?', 'created_at' => '2024-09-12 00:00:00', 'updated_at' => '2024-09-12 00:00:00'],
            ['name' => 'Janeth C. Guiriba', 'email' => 'janeth.guiriba@example.com', 'subject' => 'Feedback on Pinangat', 'message' => 'I recently tried your Zenys Pinangat, and it was delicious. Keep it up!', 'created_at' => '2024-09-13 00:00:00', 'updated_at' => '2024-09-13 00:00:00'],
            ['name' => 'Ailyn Ramirez', 'email' => 'ailyn.ramirez@example.com', 'subject' => 'Zenys Pinangat Packaging', 'message' => 'Can you provide more information on the packaging of your Zenys Pinangat for takeaway?', 'created_at' => '2024-09-13 00:00:00', 'updated_at' => '2024-09-13 00:00:00'],
            ['name' => 'Love Matocinios', 'email' => 'love.matocinios@example.com', 'subject' => 'Bulk Order Inquiry', 'message' => 'I am interested in ordering Zenys Pinangat in bulk for a family gathering.', 'created_at' => '2024-09-09 00:00:00', 'updated_at' => '2024-09-09 00:00:00'],
            ['name' => 'Dory Gonzales', 'email' => 'dory.gonzales@example.com', 'subject' => 'Order Confirmation', 'message' => 'Can you confirm if my Zenys Pinangat order has been processed?', 'created_at' => '2024-09-01 00:00:00', 'updated_at' => '2024-09-01 00:00:00'],
            ['name' => 'Vicky Morelos', 'email' => 'vicky.morelos@example.com', 'subject' => 'Zenys Pinangat Inquiry', 'message' => 'I would like to inquire about the prices and the availability of Zenys Pinangat in your shop.', 'created_at' => '2024-09-05 00:00:00', 'updated_at' => '2024-09-05 00:00:00'],
            ['name' => 'Nimfa Duran', 'email' => 'nimfa.duran@example.com', 'subject' => 'Zenys Pinangat Review', 'message' => 'I tried your Pinangat last weekend and I am very satisfied with it!', 'created_at' => '2024-09-06 00:00:00', 'updated_at' => '2024-09-06 00:00:00'],
            ['name' => 'Carl Masbate', 'email' => 'carl.masbate@example.com', 'subject' => 'Zenys Pinangat Order', 'message' => 'I would like to place an order for Zenys Pinangat for delivery.', 'created_at' => '2024-09-23 00:00:00', 'updated_at' => '2024-09-23 00:00:00'],
            ['name' => 'Josie Orense', 'email' => 'josie.orense@example.com', 'subject' => 'Pinangat Flavor', 'message' => 'Can you tell me more about the flavor of your Zenys Pinangat?', 'created_at' => '2024-09-24 00:00:00', 'updated_at' => '2024-09-24 00:00:00'],
            ['name' => 'Yolanda Mayor', 'email' => 'yolanda.mayor@example.com', 'subject' => 'Pinangat for Event', 'message' => 'I am interested in serving Zenys Pinangat for a party event. Please provide more details.', 'created_at' => '2024-09-24 00:00:00', 'updated_at' => '2024-09-24 00:00:00'],
            ['name' => 'Marlenne Rihaya', 'email' => 'marlenne.rihaya@example.com', 'subject' => 'Order Status', 'message' => 'I placed an order for Zenys Pinangat last week. I would like to check its status.', 'created_at' => '2024-09-25 00:00:00', 'updated_at' => '2024-09-25 00:00:00'],
            ['name' => 'Jose Prieto', 'email' => 'jose.prieto@example.com', 'subject' => 'Customer Feedback', 'message' => 'The Zenys Pinangat I received was fantastic. I would love to order more!', 'created_at' => '2024-09-25 00:00:00', 'updated_at' => '2024-09-25 00:00:00'],
            ['name' => 'Manolito Nipa', 'email' => 'manolito.nipa@example.com', 'subject' => 'Zenys Pinangat Variants', 'message' => 'Do you offer vegetarian options for your Zenys Pinangat?', 'created_at' => '2024-09-26 00:00:00', 'updated_at' => '2024-09-26 00:00:00'],
            ['name' => 'Ley Batacan', 'email' => 'ley.batacan@example.com', 'subject' => 'Pinangat Delivery Location', 'message' => 'Are you able to deliver Zenys Pinangat to my area?', 'created_at' => '2024-09-26 00:00:00', 'updated_at' => '2024-09-26 00:00:00'],
            ['name' => 'Jo Millete', 'email' => 'jo.millete@example.com', 'subject' => 'Zenys Pinangat Promotion', 'message' => 'Do you have any ongoing promotions for Zenys Pinangat?', 'created_at' => '2024-09-26 00:00:00', 'updated_at' => '2024-09-26 00:00:00'],
            ['name' => 'Ranel Ritual', 'email' => 'ranel.ritual@example.com', 'subject' => 'Pinangat Order Feedback', 'message' => 'I received my order for Zenys Pinangat, and I am really impressed!', 'created_at' => '2024-09-06 00:00:00', 'updated_at' => '2024-09-06 00:00:00'],

        ];

        DB::table('contacts')->insert($data);
    }
}
