<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estatus extends Model
{
    protected $table = 'estatus';
    protected $fillable = ['id', 'bodega', 'ruta', 'entregado', 'devuelto'];
    public $timestamps = false;

    public function historicos()
    {
        return $this->hasMany(Historico::class, 'id_estatus', 'id');
    }
}