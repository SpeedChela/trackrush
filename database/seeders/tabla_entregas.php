<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tabla_entregas extends Seeder
{
    public function run()
    {
        DB::table('entregas')->insert([
            [
                'id_paquete' => 1, // Paquete con id 1
                'id_driver' => 1,  // Driver con id 1
                'id_historico' => 1 // Histórico con id 1
            ],
            [
                'id_paquete' => 2, // Paquete con id 2
                'id_driver' => 2,  // Driver con id 2
                'id_historico' => 2 // Histórico con id 2
            ],
        ]);
    }
}
