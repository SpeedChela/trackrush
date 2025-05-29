<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tabla_paquetes extends Seeder
{
    public function run()
    {
        DB::table('paquetes')->insert([
            [
                'id_bodega' => 1, // Bodega CDMX
                'guia' => 'GUIA123456',
                'peso' => 5.5,
                'estado' => 'En tránsito'
            ],
            [
                'id_bodega' => 2, // Bodega GDL
                'guia' => 'GUIA789012',
                'peso' => 12.3,
                'estado' => 'Recibido'
            ],
        ]);
    }
}
