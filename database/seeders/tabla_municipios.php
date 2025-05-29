<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tabla_municipios extends Seeder
{
    public function run()
    {
        // 3 municipios por cada estado de México
        DB::table('municipios')->insert([
            // CDMX
            ['id_entidad' => 1, 'nombre' => 'Gustavo A. Madero', 'status' => true],
            ['id_entidad' => 1, 'nombre' => 'Cuauhtémoc', 'status' => true],
            ['id_entidad' => 1, 'nombre' => 'Álvaro Obregón', 'status' => true],
            
            // Estado de México
            ['id_entidad' => 2, 'nombre' => 'Toluca', 'status' => true],
            ['id_entidad' => 2, 'nombre' => 'Naucalpan', 'status' => true],
            ['id_entidad' => 2, 'nombre' => 'Ecatepec', 'status' => true],
            
            // Jalisco
            ['id_entidad' => 3, 'nombre' => 'Guadalajara', 'status' => true],
            ['id_entidad' => 3, 'nombre' => 'Zapopan', 'status' => true],
            ['id_entidad' => 3, 'nombre' => 'Tlaquepaque', 'status' => true],
            
            // Nuevo León
            ['id_entidad' => 4, 'nombre' => 'Monterrey', 'status' => true],
            ['id_entidad' => 4, 'nombre' => 'San Pedro Garza García', 'status' => true],
            ['id_entidad' => 4, 'nombre' => 'Santa Catarina', 'status' => true],
            
            // Querétaro
            ['id_entidad' => 5, 'nombre' => 'Querétaro', 'status' => true],
            ['id_entidad' => 5, 'nombre' => 'Corregidora', 'status' => true],
            ['id_entidad' => 5, 'nombre' => 'El Marqués', 'status' => true],
            
            // Guanajuato
            ['id_entidad' => 6, 'nombre' => 'León', 'status' => true],
            ['id_entidad' => 6, 'nombre' => 'Irapuato', 'status' => true],
            ['id_entidad' => 6, 'nombre' => 'Celaya', 'status' => true],
            
            // Puebla
            ['id_entidad' => 7, 'nombre' => 'Puebla', 'status' => true],
            ['id_entidad' => 7, 'nombre' => 'San Pedro Cholula', 'status' => true],
            ['id_entidad' => 7, 'nombre' => 'San Andrés Cholula', 'status' => true],
            
            // Veracruz
            ['id_entidad' => 8, 'nombre' => 'Veracruz', 'status' => true],
            ['id_entidad' => 8, 'nombre' => 'Xalapa', 'status' => true],
            ['id_entidad' => 8, 'nombre' => 'Boca del Río', 'status' => true],
            
            // Yucatán
            ['id_entidad' => 9, 'nombre' => 'Mérida', 'status' => true],
            ['id_entidad' => 9, 'nombre' => 'Progreso', 'status' => true],
            ['id_entidad' => 9, 'nombre' => 'Tizimín', 'status' => true],
            
            // Quintana Roo
            ['id_entidad' => 10, 'nombre' => 'Cancún', 'status' => true],
            ['id_entidad' => 10, 'nombre' => 'Playa del Carmen', 'status' => true],
            ['id_entidad' => 10, 'nombre' => 'Chetumal', 'status' => true],
        ]);

        // 1 municipio por cada estado fuera de México
        // Estados Unidos
        DB::table('municipios')->insert([
            ['id_entidad' => 11, 'nombre' => 'Los Ángeles', 'status' => true], // California
            ['id_entidad' => 12, 'nombre' => 'Houston', 'status' => true],     // Texas
        ]);

        // Colombia
        DB::table('municipios')->insert([
            ['id_entidad' => 13, 'nombre' => 'Bogotá', 'status' => true],     // Bogotá D.C.
            ['id_entidad' => 14, 'nombre' => 'Medellín', 'status' => true],    // Antioquia
        ]);

        // España
        DB::table('municipios')->insert([
            ['id_entidad' => 15, 'nombre' => 'Madrid', 'status' => true],      // Madrid
            ['id_entidad' => 16, 'nombre' => 'Barcelona', 'status' => true],   // Cataluña
        ]);

        // Argentina
        DB::table('municipios')->insert([
            ['id_entidad' => 17, 'nombre' => 'Buenos Aires', 'status' => true], // Buenos Aires
            ['id_entidad' => 18, 'nombre' => 'Córdoba', 'status' => true],      // Córdoba
        ]);
    }
}
