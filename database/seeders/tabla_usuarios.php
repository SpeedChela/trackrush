<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class tabla_usuarios extends Seeder
{
    public function run()
    {
        DB::table('usuarios')->insert([
            [
                'Nombre' => 'Carlos',
                'Ap_pat' => 'Pérez',
                'Ap_mat' => 'Gómez',
                'correo' => 'carlos@ejemplo.com',
                'contraseña' => Hash::make('123456'),
                'id_rol' => 1, // Admin
                'id_municipio' => 1 // Gustavo A. Madero
            ],
            [
                'Nombre' => 'Laura',
                'Ap_pat' => 'Martínez',
                'Ap_mat' => 'López',
                'correo' => 'laura@ejemplo.com',
                'contraseña' => Hash::make('123456'),
                'id_rol' => 2, // Moderador
                'id_municipio' => 2 // Cuauhtémoc
            ],
            [
                'Nombre' => 'Juan',
                'Ap_pat' => 'González',
                'Ap_mat' => 'Sánchez',
                'correo' => 'juan@ejemplo.com',
                'contraseña' => Hash::make('123456'),
                'id_rol' => 3, // Driver
                'id_municipio' => 3 // Álvaro Obregón
            ],
        ]);
    }
}
