<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tabla_drivers extends Seeder
{
    public function run()
    {
        DB::table('drivers')->insert([
            [
                'id_vehiculo' => 1, // Ford Transit
                'id_ruta' => 1,     // CDMX - GDL
                'id_paquete' => 1   // Paquete GUIA123456
            ],
            [
                'id_vehiculo' => 2, // Mercedes Sprinter
                'id_ruta' => 2,     // MTY - QRO
                'id_paquete' => 2   // Paquete GUIA789012
            ],
        ]);
    }
}
