<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculos extends Model
{
    protected $table = 'vehiculos';
    protected $fillable = ['id', 'placa', 'modelo', 'capacidad', 'id_usuario'];
    public $timestamps = false;

    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'id_usuario', 'id');
    }

    public function drivers()
    {
        return $this->hasMany(Drivers::class, 'id_vehiculo', 'id');
    }
}