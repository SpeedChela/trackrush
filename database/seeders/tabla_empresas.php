<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tabla_empresas extends Seeder
{
    public function run()
    {
        DB::table('empresas')->insert([
            ['nombre' => 'LogiTrans'],
            ['nombre' => 'Envia Ya'],
        ]);
    }
}
