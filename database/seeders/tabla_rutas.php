<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tabla_rutas extends Seeder
{
    public function run()
    {
        DB::table('rutas')->insert([
            ['zona' => 'CDMX - GDL', 'cp' => '01000'],
            ['zona' => 'MTY - QRO', 'cp' => '76000'],
        ]);
    }
}
