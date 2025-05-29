<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tabla_paises extends Seeder
{
    public function run()
    {
        DB::table('paises')->insert([
            ['nombre' => 'México', 'clave' => 'MX', 'estatus' => true],
            ['nombre' => 'Estados Unidos', 'clave' => 'US', 'estatus' => true],
            ['nombre' => 'Colombia', 'clave' => 'CO', 'estatus' => true],
            ['nombre' => 'España', 'clave' => 'ES', 'estatus' => true],
            ['nombre' => 'Argentina', 'clave' => 'AR', 'estatus' => true],
        ]);
    }
}
