<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paquetes extends Model
{
    protected $table = 'paquetes';
    protected $fillable = ['id', 'id_bodega', 'guia', 'peso', 'estado'];
    public $timestamps = false;

    public function bodega()
    {
        return $this->belongsTo(Bodegas::class, 'id_bodega', 'id');
    }

    public function drivers()
    {
        return $this->hasMany(Drivers::class, 'id_paquete', 'id');
    }

    public function entregas()
    {
        return $this->hasMany(Entregas::class, 'id_paquete', 'id');
    }
}