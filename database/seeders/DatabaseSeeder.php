<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            tabla_paises::class,
            tabla_roles::class,
            tabla_empresas::class,
            tabla_estatus::class,
            tabla_rutas::class,
            tabla_entidades::class,
            tabla_municipios::class,
            tabla_bodegas::class,
            tabla_usuarios::class,
            tabla_vehiculos::class,
            tabla_moderadores::class,
            tabla_paquetes::class,
            tabla_historico::class,
            tabla_drivers::class,
            tabla_asignar_ruta ::class,
            tabla_entregas ::class,
        ]);
    }
}