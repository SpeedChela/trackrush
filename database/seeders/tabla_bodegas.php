<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tabla_bodegas extends Seeder
{
    public function run()
    {
        DB::table('bodegas')->insert([
            [
                'id_empresa' => 1, // LogiTrans
                'ubicacion' => 'CDMX, Calle 1',
                'latitud' => 19.432608,
                'longitud' => -99.133209
            ],
            [
                'id_empresa' => 2, // EnvíaYA
                'ubicacion' => 'GDL, Calle 2',
                'latitud' => 20.659698,
                'longitud' => -103.349609
            ],
        ]);
    }
}
