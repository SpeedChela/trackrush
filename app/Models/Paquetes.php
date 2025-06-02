<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paquetes extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'paquetes';

    protected $fillable = [
        'codigo',
        'descripcion',
        'peso',
        'dimensiones',
        'bodega_origen_id',
        'bodega_destino_id',
        'ruta_id',
        'vehiculo_id',
        'estatus_id'
    ];

    protected $casts = [
        'peso' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime'
    ];

    // Relaciones
    public function bodegaOrigen()
    {
        return $this->belongsTo(Bodegas::class, 'bodega_origen_id');
    }

    public function bodegaDestino()
    {
        return $this->belongsTo(Bodegas::class, 'bodega_destino_id');
    }

    public function ruta()
    {
        return $this->belongsTo(Rutas::class);
    }

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculos::class);
    }

    public function estatus()
    {
        return $this->belongsTo(Estatus::class);
    }

    public function historial()
    {
        return $this->hasMany(HistorialPaquetes::class, 'paquete_id');
    }

    // Scopes
    public function scopeEnTransito($query)
    {
        return $query->where('estatus_id', 2);
    }

    public function scopeEntregados($query)
    {
        return $query->where('estatus_id', 4);
    }

    // Accesores
    public function getEstadoActualAttribute()
    {
        return $this->estatus ? $this->estatus->nombre : 'Sin estado';
    }
}