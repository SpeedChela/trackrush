<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tabla_roles extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert([
            ['rol' => 'Admin'],
            ['rol' => 'Moderador'],
            ['rol' => 'Driver'],
        ]);
    }
}
