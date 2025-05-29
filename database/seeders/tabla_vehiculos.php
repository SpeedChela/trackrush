<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tabla_vehiculos extends Seeder
{
    public function run()
    {
        DB::table('vehiculos')->insert([
            [
                'placa' => 'ABC123',
                'modelo' => 'Ford Transit',
                'capacidad' => 1000,
                'id_usuario' => 3 // Juan (Driver)
            ],
            [
                'placa' => 'XYZ456',
                'modelo' => 'Mercedes Sprinter',
                'capacidad' => 1500,
                'id_usuario' => 3 // Juan (Driver)
            ],
        ]);
    }
}
