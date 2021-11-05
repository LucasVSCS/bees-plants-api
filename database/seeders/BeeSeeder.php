<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bees')->insert([
            ['name' => 'Uruçu', 'scientific_name' => 'Melipona scutellaris'],
            ['name' => 'Uruçu-Amarela', 'scientific_name' => 'Melipona rufiventris'],
            ['name' => 'Guarupu', 'scientific_name' => 'Melipona bicolor'],
            ['name' => 'Iraí', 'scientific_name' => 'Nannotrigona testaceicornes'],
        ]);
    }
}
