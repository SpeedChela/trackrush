<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entregas extends Model
{
    protected $table = 'entregas';
    protected $fillable = ['id', 'id_paquete', 'id_driver', 'id_historico'];
    public $timestamps = false;

    public function paquete()
    {
        return $this->belongsTo(Paquetes::class, 'id_paquete', 'id');
    }

    public function driver()
    {
        return $this->belongsTo(Drivers::class, 'id_driver', 'id');
    }

    public function historico()
    {
        return $this->belongsTo(Historico::class, 'id_historico', 'id');
    }
}