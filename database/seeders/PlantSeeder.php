<?php

namespace Database\Seeders;

use App\Models\Bee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plants')->insert([
            ['name' => 'Abélia', 'scientific_name' => 'Abelia x grandiflora', 'month' => 'January', 'bee_id' => Bee::all()->random()->id],
            ['name' => 'Sininho', 'scientific_name' => 'Abutilon megapotamicum', 'month' => 'February', 'bee_id' => Bee::all()->random()->id],
            ['name' => 'Lanterna-chinesa', 'scientific_name' => 'Abutilon striatum', 'month' => 'January', 'bee_id' => Bee::all()->random()->id],
            ['name' => 'Acalifa-macarrão', 'scientific_name' => 'Acalypha hispida', 'month' => 'November', 'bee_id' => Bee::all()->random()->id],
            ['name' => 'Rabo-de-gato', 'scientific_name' => 'Acalypha reptans', 'month' => 'November', 'bee_id' => Bee::all()->random()->id],
            ['name' => 'Fruta-do-sabiá', 'scientific_name' => 'Acnistus arborescens', 'month' => 'April', 'bee_id' => Bee::all()->random()->id],
            ['name' => 'Violeta-pendente', 'scientific_name' => 'Achimenes grandiflora', 'month' => 'April', 'bee_id' => Bee::all()->random()->id],
            ['name' => 'Feijoa sellowiana', 'scientific_name' => 'Acca sellowiana', 'month' => 'March', 'bee_id' => Bee::all()->random()->id],
            ['name' => 'Cacto-triangular', 'scientific_name' => 'Acanthocereus tetragonus', 'month' => 'October', 'bee_id' => Bee::all()->random()->id],
            ['name' => 'Crista-de-peru', 'scientific_name' => 'Acalypha wilkesiana', 'month' => 'September', 'bee_id' => Bee::all()->random()->id],
            ['name' => 'Acorus', 'scientific_name' => 'Acorus gramineus', 'month' => 'August', 'bee_id' => Bee::all()->random()->id],
        ]);
    }
}
