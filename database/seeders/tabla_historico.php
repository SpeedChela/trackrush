<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tabla_historico extends Seeder
{
    public function run()
    {
        DB::table('historico')->insert([
            [
                'fecha_entrada' => '2025-05-01 08:00:00',
                'fecha_salida' => '2025-05-02 14:00:00',
                'id_estatus' => 1, // En tránsito
                'comentarios' => 'Paquete recogido en la bodega principal y en tránsito hacia el destino.'
            ],
            [
                'fecha_entrada' => '2025-05-03 10:00:00',
                'fecha_salida' => '2025-05-04 15:00:00',
                'id_estatus' => 2, // Recibido
                'comentarios' => 'Paquete entregado en el destino final. Entrega realizada con éxito.'
            ],
        ]);
    }
}
