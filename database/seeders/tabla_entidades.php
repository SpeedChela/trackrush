<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tabla_entidades extends Seeder
{
    public function run()
    {
        // Estados de México (10)
        DB::table('entidades')->insert([
            ['id_pais' => 1, 'nombre' => 'Ciudad de México', 'status' => true],
            ['id_pais' => 1, 'nombre' => 'Estado de México', 'status' => true],
            ['id_pais' => 1, 'nombre' => 'Jalisco', 'status' => true],
            ['id_pais' => 1, 'nombre' => 'Nuevo León', 'status' => true],
            ['id_pais' => 1, 'nombre' => 'Querétaro', 'status' => true],
            ['id_pais' => 1, 'nombre' => 'Guanajuato', 'status' => true],
            ['id_pais' => 1, 'nombre' => 'Puebla', 'status' => true],
            ['id_pais' => 1, 'nombre' => 'Veracruz', 'status' => true],
            ['id_pais' => 1, 'nombre' => 'Yucatán', 'status' => true],
            ['id_pais' => 1, 'nombre' => 'Quintana Roo', 'status' => true],
        ]);

        // 2 estados por cada otro país
        // Estados Unidos
        DB::table('entidades')->insert([
            ['id_pais' => 2, 'nombre' => 'California', 'status' => true],
            ['id_pais' => 2, 'nombre' => 'Texas', 'status' => true],
        ]);

        // Colombia
        DB::table('entidades')->insert([
            ['id_pais' => 3, 'nombre' => 'Bogotá D.C.', 'status' => true],
            ['id_pais' => 3, 'nombre' => 'Antioquia', 'status' => true],
        ]);

        // España
        DB::table('entidades')->insert([
            ['id_pais' => 4, 'nombre' => 'Madrid', 'status' => true],
            ['id_pais' => 4, 'nombre' => 'Cataluña', 'status' => true],
        ]);

        // Argentina
        DB::table('entidades')->insert([
            ['id_pais' => 5, 'nombre' => 'Buenos Aires', 'status' => true],
            ['id_pais' => 5, 'nombre' => 'Córdoba', 'status' => true],
        ]);
    }
}
