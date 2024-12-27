<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RespondentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['name' => 'Chris Queen B Arriedo', 'phone' => '09159458946', 'address' => 'Purok Tanggie,San Rafael, Bulan, Sor', 'email' => 'arriedochrisqueen@gmail.com', 'created_at' => Carbon::create(2023, 12, 5, 0, 0, 0)],
            ['name' => 'Frank N. Lagajino Jr.', 'phone' => '09946204056', 'address' => 'purok lapu-lapu, San rafael, Bulan Sorsogon', 'email' => 'franklagajinojr@gmail.com', 'created_at' => Carbon::create(2023, 12, 1, 0, 0, 0)],
            ['name' => 'Adam Guray', 'phone' => '09318845021', 'address' => 'Purok Burao, San Raefael, Bula, sor', 'email' => '24-212adam@rgdecastrocolleges.ph.edu', 'created_at' => Carbon::create(2023, 12, 5, 0, 0, 0)],
            ['name' => 'Ryan Joven', 'phone' => '09092880129', 'address' => 'gubat,sorsogon', 'email' => 'ryan.joven@example.com', 'created_at' => Carbon::create(2023, 12, 1, 0, 0, 0)],
            ['name' => 'Jovie N. Endaya', 'phone' => '09633800940', 'address' => 'Camalig, Albay', 'email' => 'jovie.endaya@example.com', 'created_at' => Carbon::create(2023, 12, 1, 0, 0, 0)],
            ['name' => 'Ana Laurisse Cepeda', 'phone' => '09294621282', 'address' => 'Camalig,Albay', 'email' => 'ana.cepeda@example.com', 'created_at' => Carbon::create(2023, 12, 2, 0, 0, 0)],
            ['name' => 'Leila Loterina', 'phone' => '09279319690', 'address' => 'Upper Gapo, Camalig, Albay', 'email' => 'leila.loterina@example.com', 'created_at' => Carbon::create(2023, 12, 1, 0, 0, 0)],
            ['name' => 'Eduardo Loterina', 'phone' => '09279319960', 'address' => 'Purok 3, Camalig, Albay', 'email' => 'eduardo.loterina@example.com', 'created_at' => Carbon::create(2023, 12, 1, 0, 0, 0)],
            ['name' => 'Cristina Yape', 'phone' => '09933199665', 'address' => 'Purok 6, tagaytay, camalig, Albay', 'email' => 'cristina.yape@example.com', 'created_at' => Carbon::create(2023, 12, 2, 0, 0, 0)],
            ['name' => 'Minda Orlain', 'phone' => '09075921809', 'address' => 'Bugkaras village, tagaytag, Camalig, Albay', 'email' => 'minda.orlain@example.com', 'created_at' => Carbon::create(2023, 12, 2, 0, 0, 0)],
            ['name' => 'Aida Morella Simangan', 'phone' => '09052486845', 'address' => 'Upper Gapo, Camalig, Albay', 'email' => 'aida.simangan@example.com', 'created_at' => Carbon::create(2023, 11, 30, 0, 0, 0)],
            ['name' => 'Mercy Buazo', 'phone' => '09067486846', 'address' => 'purok 4 Gapo, Camalig Albay', 'email' => 'mercy.buazo@example.com', 'created_at' => Carbon::create(2023, 12, 1, 0, 0, 0)],
            ['name' => 'Frankie N. Lagajino', 'phone' => '09105887167', 'address' => 'purok lapu-lapu, San rafael, Bulan Sorsogon', 'email' => 'frankielagajino@gmail.com', 'created_at' => Carbon::create(2023, 12, 1, 0, 0, 0)],
            ['name' => 'Soledad Abaroa', 'phone' => '09385679789', 'address' => 'purok lapu-lapu, San rafael, Bulan Sorsogon', 'email' => 'soledad01@gmail.com', 'created_at' => Carbon::create(2023, 12, 5, 0, 0, 0)],
            ['name' => 'John paul G. Domdom', 'phone' => '09635147550', 'address' => 'San Juan, Irosin, Sor', 'email' => 'jpg06242004@gmail.com', 'created_at' => Carbon::create(2023, 12, 5, 0, 0, 0)],
            ['name' => 'Dory Gonzales', 'phone' => null, 'address' => 'Manila', 'email' => 'dory.gonzales@example.com', 'created_at' => Carbon::create(2023, 12, 8, 0, 0, 0)],
            ['name' => 'Corazon N. Deanon', 'phone' => null, 'address' => 'Las Pinas City', 'email' => 'corazon.deanon@example.com', 'created_at' => Carbon::create(2023, 12, 8, 0, 0, 0)],
            ['name' => 'Malou Noble Sevilla', 'phone' => null, 'address' => 'Metro Manila', 'email' => 'malou.sevilla@example.com', 'created_at' => Carbon::create(2023, 12, 8, 0, 0, 0)],
            ['name' => 'Jessa Marquez Fajjardo', 'phone' => null, 'address' => 'Cebu City', 'email' => 'jessa.fajjardo@example.com', 'created_at' => Carbon::create(2023, 12, 8, 0, 0, 0)],
            ['name' => 'Doc Toto Braganza', 'phone' => null, 'address' => 'Las Vegas USA/ Daraga Albay', 'email' => 'doc.braganza@example.com', 'created_at' => Carbon::create(2023, 12, 8, 0, 0, 0)],
            ['name' => 'Christian Joy Velasco', 'phone' => null, 'address' => 'Taguig City', 'email' => 'christian.velasco@example.com', 'created_at' => Carbon::create(2023, 12, 8, 0, 0, 0)],
            ['name' => 'Atty. Jemarie Tablate', 'phone' => null, 'address' => 'Quezon City', 'email' => 'jemarie.tablate@example.com', 'created_at' => Carbon::create(2023, 12, 8, 0, 0, 0)],
            ['name' => 'Karen Baldo', 'phone' => null, 'address' => 'Quezon City', 'email' => 'karen.baldo@example.com', 'created_at' => Carbon::create(2023, 12, 8, 0, 0, 0)],
            ['name' => 'Stella Guilatco', 'phone' => null, 'address' => 'Quezon City', 'email' => 'stella.guilatco@example.com', 'created_at' => Carbon::create(2023, 12, 8, 0, 0, 0)],
            ['name' => 'Shalom Vejerano', 'phone' => null, 'address' => 'Dasmarinas Cavite', 'email' => 'shalom.vejerano@example.com', 'created_at' => Carbon::create(2023, 12, 8, 0, 0, 0)],
            ['name' => 'Janeth C. Guiriba', 'phone' => null, 'address' => 'Dasmarinas Cavite', 'email' => 'janeth.guiriba@example.com', 'created_at' => Carbon::create(2023, 12, 8, 0, 0, 0)],
            ['name' => 'Ailyn Ramirez', 'phone' => null, 'address' => 'Linao Libon Albay', 'email' => 'ailyn.ramirez@example.com', 'created_at' => Carbon::create(2023, 12, 8, 0, 0, 0)],
            ['name' => 'Ma. Esther Vibal', 'phone' => null, 'address' => 'Brgy.5, Camalig Albay', 'email' => 'esther.vibal@example.com', 'created_at' => Carbon::create(2023, 12, 8, 0, 0, 0)],
            ['name' => 'Nimfa Duran', 'phone' => null, 'address' => 'Legaspi', 'email' => 'nimfa.duran@example.com', 'created_at' => Carbon::create(2023, 12, 8, 0, 0, 0)],
            ['name' => 'Café Escudero', 'phone' => null, 'address' => 'Manila', 'email' => 'cafe.escudero@example.com', 'created_at' => Carbon::create(2023, 12, 8, 0, 0, 0)],
        ];

        foreach ($users as &$user) {
            $user['password'] = Hash::make('test1234');
            $user['role_id'] = 2;
            $user['updated_at'] = $user['created_at'];
        }

        DB::table('users')->insert($users);
    }
}
