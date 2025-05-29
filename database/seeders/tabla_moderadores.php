<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tabla_moderadores extends Seeder
{
    public function run()
    {
        DB::table('moderadores')->insert([
            [
                'id_usuario' => 1, // Carlos (Admin)
                'id_bodega' => 1   // Bodega CDMX
            ],
            [
                'id_usuario' => 2, // Laura (Moderador)
                'id_bodega' => 2   // Bodega GDL
            ],
        ]);
    }
}
