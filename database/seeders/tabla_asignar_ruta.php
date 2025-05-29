<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tabla_asignar_ruta extends Seeder
{
    public function run()
    {
        DB::table('asignar_ruta')->insert([
            ['id_driver' => 1, 'id_historico' => 1], // Driver 1 con histórico 1
            ['id_driver' => 2, 'id_historico' => 2], // Driver 2 con histórico 2
        ]);
    }
}
