<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tabla_estatus extends Seeder
{
    public function run()
    {
        DB::table('estatus')->insert([
            [
                'bodega' => 'En tránsito',
                'ruta' => 'CDMX - GDL',
                'entregado' => false,
                'devuelto' => false
            ],
            [
                'bodega' => 'Recibido',
                'ruta' => 'MTY - QRO',
                'entregado' => true,
                'devuelto' => false
            ],
        ]);
    }
}
