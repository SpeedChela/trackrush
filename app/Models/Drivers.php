<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drivers extends Model
{
    protected $table = 'drivers';
    protected $fillable = ['id', 'id_vehiculo', 'id_ruta', 'id_paquete'];
    public $timestamps = false;

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculos::class, 'id_vehiculo', 'id');
    }

    public function ruta()
    {
        return $this->belongsTo(Rutas::class, 'id_ruta', 'id');
    }

    public function paquete()
    {
        return $this->belongsTo(Paquetes::class, 'id_paquete', 'id');
    }

    public function asignarRutas()
    {
        return $this->hasMany(Asignar_ruta::class, 'id_driver', 'id');
    }

    public function entregas()
    {
        return $this->hasMany(Entregas::class, 'id_driver', 'id');
    }
}